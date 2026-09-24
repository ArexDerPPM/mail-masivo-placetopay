<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Email;
use App\Mail\MasivoMail;
use Illuminate\Support\Facades\Mail;

class EnviarMailsMasivos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:enviar-mails-masivos';

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
                Mail::to($email->email)->send(new MasivoMail());
                $email->sent_at = now();
               //aqui hacerle un atachment al email con el pdf generado, si me permite teniendo el archivo local para que envie, lo que toca hacer es po¿ublicarlo en algun sitio yque apunte alli.
               //Mail::atachments(public_path('path/to/your/file.pdf'))->send(new MasivoMail());
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
