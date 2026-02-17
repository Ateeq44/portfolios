<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $contact) {}

    public function build()
    {
        return $this->subject('New Contact Message: ' . $this->contact->subject)
            ->replyTo($this->contact->email, $this->contact->first_name.' '.$this->contact->last_name)
            ->view('emails.contact-received');
    }
}
