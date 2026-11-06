<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Email;
use App\Mail\MasivoMail;
use Illuminate\Support\Facades\Mail;

class EnviarMailsMasivosSinPDFs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:enviar-mails-masivos-snpdfs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía correos masivos a todos los emails de la tabla emails usando Mailgun.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Aumentar el límite de ejecución y memoria
        set_time_limit(0);
        ini_set('memory_limit', '-1');

        $emails = Email::whereNull('sent_at')->get();
        //dd($emails);
        $total = $emails->count();
        $this->info("Enviando $total correos...");

        foreach ($emails as $email) {
            try {
                $recipients = array_values(array_filter(array_map(
                    static fn (string $r): string => trim($r, " \t\n\r\0\x0B/\\"),
                    preg_split('/[;,\s]+/', $email->email),
                ), static fn (string $recipient): bool => filter_var($recipient, FILTER_VALIDATE_EMAIL) !== false));

                if ($recipients === []) {
                    throw new \InvalidArgumentException('No contiene direcciones de correo válidas.');
                }

                Mail::to($recipients)->send(new MasivoMail());
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
}
 