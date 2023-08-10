<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body>
    <h1>New Contact Form Submission</h1>
    <p>Name: {{ $formData['name'] }}</p>
    <p>Email: {{ $formData['email'] }}</p>
    <p>Subject: {{ $formData['subject'] }}</p>
    <p>Message: {{ $formData['message'] }}</p>
</body>
</html>
