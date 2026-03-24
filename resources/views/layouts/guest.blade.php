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
    <body class="font-sans text-slate-900 antialiased">
        <div class="relative min-h-screen bg-gradient-to-b from-emerald-50 to-slate-100">
            <div class="mx-auto flex min-h-screen max-w-6xl items-center justify-center px-4 py-10 sm:px-6">
                <div class="grid w-full items-center gap-8 lg:grid-cols-2">
                    <div class="hidden lg:block">
                        <p class="mb-3 inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">HydroSpice Shop</p>
                        <h1 class="mb-4 text-4xl font-bold leading-tight text-slate-800">Grow better, sell smarter, manage faster.</h1>
                        <p class="text-slate-600">Access your store account to track orders, manage inventory, and stay connected with customers.</p>
                    </div>

                    <div class="w-full">
                        <div class="mb-4 text-center lg:hidden">
                            <a href="/" class="inline-flex items-center gap-2 text-emerald-700">
                                <x-application-logo class="h-10 w-10 fill-current" />
                                <span class="font-semibold">HydroSpice Shop</span>
                            </a>
                        </div>
                        <div class="panel overflow-hidden">
                            <div class="panel-body">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
