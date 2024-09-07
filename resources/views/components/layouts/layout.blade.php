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
<!-- ========== HEADER ========== -->
<header class="flex flex-wrap justify-between md:justify-start md:flex-nowrap z-50 w-full py-7 bg-white border-b border-gray-200">
    <nav
        class="relative max-w-7xl w-full flex flex-wrap justify-between md:grid md:grid-cols-12 basis-full items-center px-4 md:px-6 md:px-8 mx-auto">
        <div class="order-1 md:col-span-3">
            <!-- Logo -->
            <a class="flex-none rounded-xl text-2xl inline-block font-logo focus:outline-none focus:opacity-80"
               href="{{ route('index') }}" aria-label="{{ \App\Facades\Setting::get('site_name') }}">
                {{ \App\Facades\Setting::get('site_name') }}
            </a>
            <!-- End Logo -->
        </div>

        <!-- Collapse -->
        <div id="hs-navbar-hcail"
             class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block md:w-auto md:basis-auto order-2 md:col-span-6"
             aria-labelledby="hs-navbar-hcail-collapse">
            <div
                class="flex flex-col gap-y-4 gap-x-0 mt-5 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-7 md:mt-0">

                @foreach(\App\Facades\Menu::get('Main Menu') as $menu_item)
                    <div>
                        <a class="inline-block text-black hover:text-gray-600 focus:outline-none focus:text-gray-600 {{ request()->is(ltrim($menu_item['url'], '/')) || request()->is(ltrim($menu_item['url'], '/') . '/*') ? 'underline decoration-lime-400 decoration-8' : '' }}"
                           href="{{ url($menu_item['url']) }}">{{ $menu_item['name'] }}</a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End Collapse -->

        <!-- Hamburger -->
        <div class="order-3 md:hidden">
            <button class="navbar-burger w-full flex items-end text-lime-400 p-3">
                <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>{{ __('Mobile menu') }}</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
        <!-- End Hamburger -->
    </nav>

    <!-- Mobile menu -->
    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex justify-between mb-8">
                <a class="flex-none rounded-xl text-xl inline-block font-logo focus:outline-none focus:opacity-80"
                   href="{{ route('index') }}" aria-label="{{ \App\Facades\Setting::get('site_name') }}">
                    {{ \App\Facades\Setting::get('site_name') }}
                </a>
                <button class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div>
                <ul>
                    <li class="mb-4">
                        <a class="inline-block text-black text-xl hover:text-gray-600 focus:outline-none focus:text-gray-600 {{ request()->routeIs('about') ? 'underline decoration-lime-400 decoration-4' : '' }}"
                           href="{{ route('about') }}">{{ __('About me') }}</a>
                    </li>
                    <li class="mb-4">
                        <a class="inline-block text-black text-xl hover:text-gray-600 focus:outline-none focus:text-gray-600 {{ request()->routeIs(['blog.*', 'posts.*']) ? 'underline decoration-lime-400 decoration-4' : '' }}"
                           href="{{ route('blog.index') }}">{{ __('Blog') }}</a>
                    </li>
                    <li class="mb-4">
                        <a class="inline-block text-black text-xl hover:text-gray-600 focus:outline-none focus:text-gray-600 {{ request()->routeIs('contact') ? 'underline decoration-lime-400 decoration-4' : '' }}"
                           href="{{ route('contact') }}">{{ __('Contact me') }}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile menu -->
</header>
<!-- ========== END HEADER ========== -->

<main class="bg-pattern px-4 md:px-8">
    {{ $slot }}
</main>

<footer class="mt-auto w-full bg-white border-t border-gray-200">
    <div class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <!-- Grid -->
        <div class="flex flex-col justify-center md:grid md:grid-cols-1 md:grid-cols-3 md:items-center gap-5">
            <div class="h-12 flex items-center text-center md:text-left">
                <!-- Logo -->
                <a class="flex-none rounded-xl text-lg inline-block font-logo focus:outline-none focus:opacity-80"
                   href="{{ route('index') }}" aria-label="{{ \App\Facades\Setting::get('site_name') }}">
                    {{ \App\Facades\Setting::get('site_name') }}
                </a>
                <!-- End Logo -->
            </div>
            <!-- End Col -->

            <ul class="text-center flex flex-col md:flex-row">
                <li class="inline-block relative pe-8 md:last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 md:before:content-['/'] md:before:text-gray-300">
                    <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800" href="{{ route('about') }}">
                        {{ __('About me') }}
                    </a>
                </li>
                <li class="inline-block relative pe-8 md:last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 md:before:content-['/'] md:before:text-gray-300">
                    <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800" href="{{ route('blog.index') }}">
                        {{ __('Blog') }}
                    </a>
                </li>
                <li class="inline-block relative pe-8 md:last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 md:before:content-['/'] md:before:text-gray-300">
                    <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800" href="{{ route('contact') }}">
                        {{ __('Contact me') }}
                    </a>
                </li>
            </ul>
            <!-- End Col -->

            <!-- Social Brands -->
            <div class="text-center pe-8 md:pe-0 md:text-end md:space-x-2">
                <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" href="#">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                    </svg>
                </a>
            </div>
            <!-- End Social Brands -->
        </div>
        <!-- End Grid -->
    </div>
</footer>

@include('cookie-consent::index')
</body>
</html>

<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');

        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');

        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });
</script>
