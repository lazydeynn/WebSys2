<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'VistaGo') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased overflow-hidden">
    <div class="min-h-screen flex">
        <div class="hidden lg:flex lg:w-1/2 relative bg-indigo-900">
            <div class="absolute inset-0 bg-black bg-opacity-30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Background" class="absolute inset-0 w-full h-full object-cover">
            <div class="relative z-20 flex flex-col justify-center px-16 xl:px-24 h-full text-white">
                <a href="/" class="text-4xl font-black tracking-tighter mb-12">VistaGo.</a>
                <h1 class="text-5xl font-extrabold mb-6 leading-tight">Discover the Unseen <br>Beauty of the Philippines.</h1>
                <p class="text-xl text-gray-200 font-light">Join thousands of tourists booking their next adventure with certified local guides.</p>
            </div>
        </div>
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-gray-50 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-3xl shadow-xl border border-gray-100">
                <div class="lg:hidden text-center mb-8">
                    <a href="/" class="text-4xl font-black text-indigo-600 tracking-tighter">VistaGo.</a>
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>