<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class agentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $programming;
    public $category ="";
    public $first_name="";
    public $last_name="";


    public function __construct($programming , $category , $account)
    {
        $this->programming = $programming;
        $this->first_name = $account->first_name;
        $this->last_name = $account->last_name;
        $this->category = $category;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Propriété en recherche',
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.programing-notify-agent',
        );
    }

    public function attachments()
    {
        return [];
    }
}
