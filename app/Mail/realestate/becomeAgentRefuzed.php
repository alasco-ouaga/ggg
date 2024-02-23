<?php

namespace App\Mail\realestate;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class becomeAgentRefuzed extends Mailable
{
    use Queueable, SerializesModels;

    public $motif = "";
    public $first_name = "";
    public $last_name = "";
    public function __construct($motif , $user)
    {
        $this->motif = $motif;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Passage au compte agent',
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.become-agent-refuzed',
        );
    }

    public function attachments()
    {
        return [];
    }
}
