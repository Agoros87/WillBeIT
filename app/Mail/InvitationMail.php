<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public function __construct()
    {
        $this->user = auth()->user();

    }

    public function build()
    {
        return $this->view('emails.invitation')
            ->with([
                'url' => url("/register-invited/{$this->user->invitation_token}")
            ]);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invitation to register',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.invitation',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
