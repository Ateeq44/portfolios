<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Message</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <h2>New Contact Message</h2>

    <p><strong>Name:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Phone:</strong> {{ $contact->phone ?? '—' }}</p>
    <p><strong>Subject:</strong> {{ $contact->subject }}</p>

    <hr>

    <p><strong>Message:</strong></p>
    <p style="white-space: pre-line;">{{ $contact->message }}</p>

    <hr>
    <p><small>IP: {{ $contact->ip ?? '—' }} | UA: {{ $contact->user_agent ?? '—' }}</small></p>
</body>
</html>
