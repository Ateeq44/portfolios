<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUserAutoReply extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $contact) {}

    public function build()
    {
        return $this->subject('We received your message')
            ->replyTo(
                config('mail.contact_to.address'),
                config('mail.contact_to.name', 'Admin')
            )
            ->view('emails.user'); // resources/views/emails/user.blade.php
    }
}
