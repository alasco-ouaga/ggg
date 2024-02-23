<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class realEstateAgentConfirmedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user = "";

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'passage à agent imobilier reussi',
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.real-estate-agent-confirmed',
        );
    }

    public function attachments()
    {
        return [];
    }
}
