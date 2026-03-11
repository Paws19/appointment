<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailToStaff extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $appointment;
    public $logoPath;
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
        $this->logoPath = public_path('img/logo.png');
    }

    /**
     * Get the message envelope.
     */

    public function build()
    {
        return $this->view('email.sendemailtostaff')
                    ->with([
                        'appointment' => $this->appointment,
                    ]);
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Request for Appointment',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.sendemailtostaff',
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
