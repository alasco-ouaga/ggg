<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class custumerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $custumer;
    public $first_name;
    public $last_name;
    public function __construct($custumer)
    {
        $this->first_name = $custumer->first_name;
        $this->custumer =$custumer->last_name;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'programmation de la recherche',
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.programing-notify-custumer',
        );
    }

    public function attachments()
    {
        return [];
    }
}
