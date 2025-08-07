<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to {{ config('app.name') }}</title>
    </head>
    <body>
        <h1>Welcome, {{ $user->name }}!</h1>
        <p>Thank you for joining {{ config('app.name') }}. We're excited to have you on board!</p>
        <p>Your account has been successfully created with the email: {{ $user->email }}</p>
        <p>Best regards,<br>{{ config('app.name') }} Team</p>
    </body>
</html>