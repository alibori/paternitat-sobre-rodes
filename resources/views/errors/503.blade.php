<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <title>{{ $title ?? \App\Facades\Setting::get('site_name') }}</title>
    <meta name="description" content="{{ $description ?? \App\Facades\Setting::get('meta_description') ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? \App\Facades\Setting::get('meta_keywords') ?? '' }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
<main class="bg-pattern h-screen w-full flex flex-col justify-center align-middle">
    <!-- Logo -->
    <a class="w-auto text-8xl inline-block font-logo text-center focus:outline-none focus:opacity-80"
       href="{{ route('index') }}" aria-label="{{ \App\Facades\Setting::get('site_name') }}">
        {{ \App\Facades\Setting::get('site_name') }}
    </a>
    <!-- End Logo -->

    <!-- Maintenance Message -->
    <div class="text-center text-3xl mt-12 px-4">
        {{ __('We are currently performing maintenance. Please check back later.') }}
    </div>
</main>
</body>
</html>
