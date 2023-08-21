<!DOCTYPE html>
<html>

<head>
    <title>Confirmation of registration</title>
</head>

<body>
    <p>Hello,{{ $user->name }}!</p>
    <p>Please click on the link below to confirm your registration:</p>
    <a href="{{ url('admin/confirm-registration/' . $user->confirmation_token) }}">Confirm your registration</a>
</body>

</html>
