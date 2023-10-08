<!DOCTYPE html>
<html>
<head>
    <title>MIH</title>
</head>
<body>
<h1>Registration Success</h1>
{{--<p>Dear, {{ $mailData['title'] }}</p>--}}
<p>Dear, {{ $mailData->name }}</p>
<p>Your registration was successful.</p>
<p></p>

<p>Thank you</p>
</body>
</html>
