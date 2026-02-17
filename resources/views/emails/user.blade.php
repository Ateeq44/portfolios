<!doctype html>
<html>
<head><meta charset="utf-8"></head>
<body style="font-family: Arial, sans-serif;">
  <h2>Thanks for contacting us!</h2>

  <p>Hi {{ $contact->first_name }} {{ $contact->last_name }},</p>

  <p>
    We’ve received your message and our team will get back to you as soon as possible
    (usually within 12-24 hours).
  </p>

  <hr>

  <p><strong>Your Subject:</strong> {{ $contact->subject }}</p>
  <p><strong>Your Message:</strong></p>
  <p style="white-space: pre-line;">{{ $contact->message }}</p>

  <hr>

  <p>Regards,<br>ARU WebTech</p>
</body>
</html>
