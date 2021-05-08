<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'The Connecting Humanity Project') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/styles.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>

<div class="min-h-0 bg-teal-500">
        @if (Route::has('login'))
            <nav class="fixed top-0 shadow-md flex items-center justify-between flex-wrap bg-white p-6 w-full">
                <div class="flex items-center flex-shrink-0 text-black mr-6">
                    <img width="54" height="54" src="{{ asset('img/icon.png') }}">
                    <span class="font-semibold text-xl tracking-tight">The Connecting Humanity Project</span>
                </div>
                <div class="block lg:hidden">
                    <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-yellow-300 hover:border-white">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
                <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                    <div class="text-sm lg:flex-grow">
                        <a href="{{ route('home') }}" class="block mt-4 lg:inline-block lg:mt-0 hover:text-yellow-300 mr-4">
                            Home
                        </a>
                        <a href="{{ route('about') }}" class="block mt-4 lg:inline-block lg:mt-0 hover:text-yellow-300 mr-4">
                            About
                        </a>
                        <a href="{{ route('volunteer') }}" class="block mt-4 lg:inline-block lg:mt-0 hover:text-yellow-300 mr-4">
                            Volunteer
                        </a>
                        <a href="{{ route('contact') }}" class="block mt-4 lg:inline-block lg:mt-0 hover:text-yellow-300 mr-4">
                            Contact
                        </a>
                        <a href="{{ route('public_pages_index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-gray-500 mr-4">
                            Pages
                        </a>
                        <a href="{{ route('public_posts_index') }}" class="block mt-4 lg:inline-block lg:mt-0 hover:text-yellow-300">
                            Blog
                        </a>
                    </div>
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="block mt-4 lg:inline-block lg:mt-0 hover:text-yellow-300">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="block mt-4 lg:inline-block lg:mt-0 hover:text-yellow-300">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block mt-4 ml-4 lg:inline-block lg:mt-0 hover:text-yellow-300">Register</a>
                            @endif
                        @endauth
                        <a href="{{ route('donate') }}" class="ml-4 inline-block text-sm px-4 py-2 leading-none border rounded text-black border-black hover:border-transparent hover:text-yellow-300 hover:bg-white mt-4 lg:mt-0">Donate</a>
                        </div>
                    @endif
                </div>
            </nav>

     <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

</div>
<div class="mx-auto bg-white">
    {{ $slot }}
</div>
<footer>
    <p class="copyright">Copyright &copy; <script>document.write(new Date().getFullYear())</script> The Connecting Humanity Project All Rights Reserved</p>
</footer>

<!-- FONT AWESOME LIBRARY -->
<script src="https://use.fontawesome.com/799900a7e3.js"></script>

</body>
</html>
