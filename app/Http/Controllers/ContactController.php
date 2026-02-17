<?php

namespace App\Http\Controllers;

use App\Mail\ContactAdminNotification;
use App\Mail\ContactUserAutoReply;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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
            'privacy'    => ['accepted'],
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

        // ✅ Admin email (your admin inbox)
        $adminEmail = config('mail.contact_to.address') ?: 'ateeqrehman4809@gmail.com';
        $adminName  = config('mail.contact_to.name', 'Admin');

        // ✅ Debug log (optional)
        Log::info('CONTACT MAIL TO ADMIN => '.$adminEmail);

        // 1) Admin notification (separate template)
        Mail::to($adminEmail, $adminName)->send(new ContactAdminNotification($contact));

        // 2) User auto-reply (separate template)
        Mail::to($contact->email, $contact->first_name)->send(new ContactUserAutoReply($contact));

        return back()->with('success', 'Thanks! Your message has been sent successfully.');
    }
}
