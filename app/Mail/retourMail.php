<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class retourMail extends Mailable
{
    use Queueable, SerializesModels;
    public $link = "";
    public $custumer;

    public function __construct($link , $custumer)
    {
        $this->link = $link;
        $this->custumer = $custumer;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Propriété en recherche disponible',
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.programing-find-notify',
        );
    }

    public function attachments()
    {
        return [];
    }
}
