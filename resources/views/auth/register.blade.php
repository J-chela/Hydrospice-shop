<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Register | {{ config('app.name', 'HydroSpice Shop') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased">
        <main class="min-h-screen bg-gradient-to-b from-emerald-50 to-slate-100 px-4 py-10 sm:px-6">
            <div class="mx-auto flex min-h-[calc(100vh-5rem)] w-full max-w-5xl items-center">
                <div class="mx-auto w-full rounded-2xl bg-white shadow-xl">
                    <div class="grid overflow-hidden rounded-2xl lg:grid-cols-2">
                        <aside class="relative flex min-h-[560px] flex-col justify-between bg-gradient-to-br from-teal-500 to-emerald-500 p-10 text-white">
                            <div>
                                <a href="/" class="inline-flex items-center gap-2 text-sm font-medium text-white/90">
                                    <x-application-logo class="h-8 w-8 fill-current" />
                                    <span>HydroSpice Shop</span>
                                </a>
                            </div>

                            <div>
                                <h2 class="text-3xl font-bold">Welcome!</h2>
                                <p class="mt-3 max-w-xs text-sm text-white/85">
                                    Create your account to start managing stock, products, and customer orders in one place.
                                </p>
                            </div>

                            <div>
                                <a href="{{ route('login') }}" class="inline-flex items-center rounded-full border border-white/70 px-6 py-2 text-sm font-semibold text-white transition hover:bg-white hover:text-emerald-600">
                                    Sign in
                                </a>
                            </div>
                        </aside>

                        <section class="p-8 sm:p-10">
                            <h1 class="text-center text-2xl font-bold text-teal-600">Create Account</h1>

                            <div class="mt-4 flex items-center justify-center gap-3 text-sm text-slate-500">
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-slate-300">f</span>
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-slate-300">G</span>
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-slate-300">in</span>
                            </div>

                            <p class="mt-5 text-center text-xs uppercase tracking-wide text-slate-400">or use your email for registration</p>

                            <form method="POST" action="{{ route('register') }}" class="mt-5 space-y-4">
                                @csrf

                                <div>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                                        class="w-full rounded-md border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100"
                                        placeholder="Full Name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                                        class="w-full rounded-md border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100"
                                        placeholder="Email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div>
                                    <input id="password" type="password" name="password" required autocomplete="new-password"
                                        class="w-full rounded-md border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100"
                                        placeholder="Password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div>
                                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                                        class="w-full rounded-md border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100"
                                        placeholder="Confirm Password" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <button type="submit"
                                    class="mt-2 w-full rounded-full bg-gradient-to-r from-teal-500 to-emerald-500 px-6 py-3 text-sm font-semibold uppercase tracking-wider text-white transition hover:opacity-95">
                                    Sign Up
                                </button>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
