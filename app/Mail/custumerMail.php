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

    public $first_name="";
    public $last_name="";
    public function __construct($account)
    {
        $this->first_name = $account->first_name;
        $this->last_name =$account->last_name;
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
