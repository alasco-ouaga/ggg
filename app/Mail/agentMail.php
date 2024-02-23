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

    public $programing ="";
    public $category_name ="";
    public $user;


    public function __construct($programing , $category_name , $user)
    {
        $this->programing = $programing;
        $this->user = $user;
        $this->category_name = $category_name;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
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

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
