<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white relative overflow-hidden">
            <!-- Monochrome abstract aesthetic background -->
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#f3f4f6_1px,transparent_1px),linear-gradient(to_bottom,#f3f4f6_1px,transparent_1px)] bg-[size:3rem_3rem]"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-white via-white/80 to-transparent"></div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-gray-100 rounded-full blur-[80px] opacity-70"></div>
            <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-gray-50 rounded-full blur-[100px]"></div>

            <div class="relative z-10 mb-4 mt-8">
                <a href="/">
                    <x-application-logo class="w-auto h-8" />
                </a>
            </div>

            <div class="relative z-10 w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-[0_8px_30px_rgb(0,0,0,0.06)] border border-gray-100 overflow-hidden sm:rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
