<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required','string','max:120'],
            'last_name'  => ['required','string','max:120'],
            'email'      => ['required','email','max:190'],
            'phone'      => ['nullable','string','max:50'],
            'subject'    => ['required','string','max:190'],
            'message'    => ['required','string','max:5000'],
            'privacy'    => ['accepted'], // checkbox required
        ]);

        $contact = ContactMessage::create([
            'first_name'        => $data['first_name'],
            'last_name'         => $data['last_name'],
            'email'             => $data['email'],
            'phone'             => $data['phone'] ?? null,
            'subject'           => $data['subject'],
            'message'           => $data['message'],
            'privacy_accepted'  => true,
            'ip'                => $request->ip(),
            'user_agent'        => $request->userAgent(),
        ]);

        // Admin email جہاں message جائے گا:
        $to = config('mail.contact_to.address', config('mail.from.address'));
        $toName = config('mail.contact_to.name', config('app.name'));

        Mail::to($to, $toName)->send(new ContactMessageReceived($contact));

        // normal form submit:
        return back()->with('success', 'Thanks! Your message has been sent successfully.');
    }
}
