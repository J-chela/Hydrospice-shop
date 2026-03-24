<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="app-shell">
<div class="flex min-h-screen">
    <aside class="hidden md:flex w-24 flex-col items-center gap-5 border-r border-slate-200 bg-white py-6 shadow-sm">
        <a href="{{ route('home') }}" class="text-2xl" title="Home">🌿</a>

        <nav class="flex flex-col gap-3 text-xl">
            <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'sidebar-link-active' : '' }}" title="Dashboard">🏠</a>
            <a href="{{ route('dashboard.plants') }}" class="sidebar-link {{ request()->routeIs('dashboard.plants') ? 'sidebar-link-active' : '' }}" title="Plants">🪴</a>
            <a href="{{ route('dashboard.orders') }}" class="sidebar-link {{ request()->routeIs('dashboard.orders') ? 'sidebar-link-active' : '' }}" title="Orders">📦</a>
            <a href="{{ route('messages.index') }}" class="sidebar-link {{ request()->routeIs('messages.*') ? 'sidebar-link-active' : '' }}" title="Messages">💬</a>
            <a href="{{ route('dashboard.favorites') }}" class="sidebar-link {{ request()->routeIs('dashboard.favorites') ? 'sidebar-link-active' : '' }}" title="Favorites">⭐</a>
            <a href="{{ route('dashboard.settings') }}" class="sidebar-link {{ request()->routeIs('dashboard.settings') ? 'sidebar-link-active' : '' }}" title="Settings">⚙️</a>
        </nav>
    </aside>

    <main class="flex-1">
        <header class="sticky top-0 z-20 border-b border-slate-200 bg-white/90 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6">
                <h1 class="text-lg font-semibold text-slate-800">HydroSpice Dashboard</h1>
                <div class="flex items-center gap-3">
                    <a href="{{ route('profile.edit') }}" class="rounded-lg border border-slate-300 px-3 py-1.5 text-sm hover:bg-slate-50">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-lg bg-slate-900 px-3 py-1.5 text-sm text-white hover:bg-slate-700">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <section class="mx-auto max-w-7xl p-4 sm:p-6">
            @yield('content')
        </section>
    </main>
</div>
</body>
</html>
