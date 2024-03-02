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
    public $first_name = "";
    public $last_name = "";

    public function __construct($user)
    {
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
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
