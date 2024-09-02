<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Contact Form Submission') }}</title>
</head>
<body>
    <h1>{{ __('Contact Form Submission') }}</h1>
    <p>{{ __('You have received a new contact form submission. Here are the details:') }}</p>

    <ul>
        <li><strong>{{ __('First Name') }}:</strong> {{ $data['name'] }}</li>
        <li><strong>{{ __('Last Name') }}:</strong> {{ $form['surname'] ?? '' }}</li>
        <li><strong>{{ __('Email') }}:</strong> {{ $data['email'] }}</li>
        <li><strong>{{ __('Message') }}:</strong> {{ $data['message'] }}</li>
    </ul>
</body>
</html>
