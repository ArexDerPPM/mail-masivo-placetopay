# Plan: Adjuntar PDF en Envío Masivo de Correos

**Proyecto:** mail-placetopay  
**Fecha:** 2026-09-24  
**Autor:** Diego Rivas  
**Estado:** Pendiente de ejecución

---

## Diagnóstico actual

| Archivo | Rol | Estado |
|---|---|---|
| `app/Console/Commands/EnviarMailsMasivos.php` | Comando artisan que itera emails y llama `MasivoMail` | Tiene comentario de intent pero implementación incompleta |
| `app/Mail/MasivoMail.php` | Mailable de Laravel, define sobre, contenido y adjuntos | `attachments()` retorna array vacío |
| `resources/views/emails/masivo.blade.php` | HTML del email (Blade template) | Funcional, sin cambios necesarios |

### Problema identificado en el código actual

En `EnviarMailsMasivos.php:45` hay un intento comentado incorrecto:
```php
// Mail::atachments(public_path('path/to/your/file.pdf'))->send(new MasivoMail());
```
Este approach es erróneo. El adjunto debe definirse dentro de `MasivoMail::attachments()`, no en la fachada `Mail`.

---

## Enfoque elegido: PDF local en `storage/app/pdfs/`

Se coloca el PDF en el servidor una vez, y cada correo lo adjunta.  
**Sin generación dinámica** (sin dompdf por ahora — se puede agregar después si se necesita).

---

## Tareas de ejecución

### FASE 1 — Preparar directorio de PDFs

- [ ] **T1.1** Crear carpeta `storage/app/pdfs/`
- [ ] **T1.2** Colocar el PDF a enviar en esa carpeta (ej: `boletin-agosto-2025.pdf`)
- [ ] **T1.3** Verificar permisos de lectura del archivo (`chmod 644`)

---

### FASE 2 — Modificar `MasivoMail.php`

- [ ] **T2.1** Agregar propiedad `$pdfPath` al constructor
- [ ] **T2.2** Implementar `attachments()` usando `Attachment::fromPath()`
- [ ] **T2.3** Agregar parámetro `$pdfName` para nombre visible del adjunto (ej: `"Boletin-PlacetoPay.pdf"`)

**Resultado esperado:**
```php
use Illuminate\Mail\Mailables\Attachment;

class MasivoMail extends Mailable
{
    public function __construct(public string $pdfPath, public string $pdfName = 'Boletin.pdf')
    {}

    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->pdfPath)->as($this->pdfName)->withMime('application/pdf'),
        ];
    }
}
```

---

### FASE 3 — Modificar `EnviarMailsMasivos.php`

- [ ] **T3.1** Definir la ruta del PDF con `storage_path()`
- [ ] **T3.2** Validar que el archivo exista antes de iniciar el loop (fail-fast)
- [ ] **T3.3** Pasar `$pdfPath` al constructor de `MasivoMail`
- [ ] **T3.4** Remover el comentario de código muerto (`Mail::atachments(...)`)

**Resultado esperado:**
```php
public function handle()
{
    set_time_limit(0);
    ini_set('memory_limit', '-1');

    $pdfPath = storage_path('app/pdfs/boletin-agosto-2025.pdf');

    if (!file_exists($pdfPath)) {
        $this->error("PDF no encontrado: $pdfPath");
        return 1;
    }

    $emails = Email::whereNull('sent_at')->get();
    $total = $emails->count();
    $this->info("Enviando $total correos con adjunto PDF...");

    foreach ($emails as $email) {
        try {
            Mail::to($email->email)->send(new MasivoMail($pdfPath));
            $email->sent_at = now();
            $email->save();
            $this->info("Enviado a: {$email->email}");
        } catch (\Exception $e) {
            $this->error("Error con {$email->email}: " . $e->getMessage());
        }
    }

    $this->info('Proceso finalizado.');
    return 0;
}
```

---

### FASE 4 — Prueba local

- [ ] **T4.1** Configurar `.env` con mailer `log` para no enviar reales durante prueba
- [ ] **T4.2** Insertar un email de prueba en tabla `emails` con `sent_at = NULL`
- [ ] **T4.3** Correr: `php artisan app:enviar-mails-masivos`
- [ ] **T4.4** Verificar en `storage/logs/laravel.log` que el adjunto aparece en el mensaje

---

### FASE 5 — Prueba real con Mailgun

- [ ] **T5.1** Restaurar `.env` con credenciales reales de Mailgun
- [ ] **T5.2** Probar con 1 solo email real (tuyo o de prueba)
- [ ] **T5.3** Confirmar que el PDF llega adjunto y el HTML se ve correcto
- [ ] **T5.4** Limpiar `sent_at` del correo de prueba si necesitas reenviar

---

### FASE 6 — Commit y push

- [ ] **T6.1** `git add` de los archivos modificados
- [ ] **T6.2** Commit con mensaje descriptivo
- [ ] **T6.3** `git push origin main`

---

## Consideraciones importantes

### Tamaño del PDF
Mailgun tiene límite de **25 MB por email**. PDF grande = posible rechazo o lentitud. Optimizar PDF si supera 5 MB.

### Ruta del PDF
Usar siempre `storage_path('app/pdfs/archivo.pdf')` — nunca `public_path()` para archivos privados.

### Si el PDF cambia por boletin
Parametrizar el nombre del archivo vía argumento de artisan:
```
php artisan app:enviar-mails-masivos --pdf=boletin-septiembre-2025.pdf
```
(Esto es mejora opcional para FASE 3 si se necesita.)

### Alternativa futura: generar PDF desde el Blade
Si se quiere generar el PDF desde `masivo.blade.php` automáticamente:
- Instalar `barryvdh/laravel-dompdf`
- Generar en memoria y pasar como `Attachment::fromData()`
- No requiere archivo físico en disco

---

## Orden de ejecución

```
T1.1 → T1.2 → T1.3
T2.1 → T2.2 → T2.3
T3.1 → T3.2 → T3.3 → T3.4
T4.1 → T4.2 → T4.3 → T4.4
T5.1 → T5.2 → T5.3
T6.1 → T6.2 → T6.3
```

**Tiempo estimado:** 30–45 minutos de implementación + tiempo de prueba.
