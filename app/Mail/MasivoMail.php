<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Headers;
use Illuminate\Queue\SerializesModels;

class MasivoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * La URL de la imagen a mostrar en el correo.
     */
   // public $imageUrl = 'https://static.bendo.ec/2025/3dsgye.jpg'; // Cambia aquí tu URL
    public $imageUrl = 'https://static.bendo.ec/2025/new_dashboard_p2p.jpg'; // Cambia aquí tu URL
    //public $altUrl = 'https://static.bendo.ec/2025/3dsgye.jpg'; // Cambia aquí si quieres otro enlace
    public $altUrl = 'https://static.bendo.ec/2025/new_dashboard_p2p.jpg'; // Cambia aquí si quieres otro enlace

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        // No necesita parámetros
    }

    /**
     * Get the message envelope.
     **/
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo material de apoyo disponible para gestionar sus servicios de forma ágil',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.masivo',
        );
    }
    /**
     * Desactiva el tracking de Mailgun.
     */
    public function headers(): Headers
    {
        return new Headers(
            text: [
                'X-Mailgun-Track' => 'yes',
                'X-Mailgun-Track-Clicks' => 'yes',
                'X-Mailgun-Track-Opens' => 'yes',
            ]
        );
    }


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
