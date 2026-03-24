<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HydroSpice Shop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="app-shell">

    <!-- TOP NAVBAR -->
    <header class="bg-white shadow-sm border-b border-slate-200">
        <div class="max-w-7xl mx-auto flex items-center justify-between p-4 gap-4">

            <!-- LOGO -->
            <a href="{{ route('home') }}" class="text-2xl font-bold text-green-700">HydroSpice Shop</a>

            <!-- SEARCH BAR -->
            <div class="flex-1 mx-2 hidden md:block">
                <input type="text"
                       placeholder="Search for products..."
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- ICONS -->
            <div class="flex items-center space-x-4">

                <!-- Cart Icon -->
                <a href="{{ route('dashboard.orders') }}" class="text-xl" title="Orders">🛒</a>

                <!-- Profile Icon -->
                <div class="relative group">
                    <button type="button" class="text-xl">👤</button>

                    <!-- Dropdown -->
                    <div class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-lg hidden group-hover:block p-2">
                        @auth
                            <a href="{{ route('dashboard') }}" class="block px-3 py-2 hover:bg-gray-100">Dashboard</a>
                            <a href="{{ route('profile.edit') }}" class="block px-3 py-2 hover:bg-gray-100">Profile</a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="w-full text-left px-3 py-2 hover:bg-gray-100">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block px-3 py-2 hover:bg-gray-100">Login</a>
                            <a href="{{ route('register') }}" class="block px-3 py-2 hover:bg-gray-100">Register</a>
                        @endauth
                    </div>
                </div>
            </div>

        </div>

        <!-- CATEGORY BAR -->
        <nav class="brand-gradient">
            <div class="max-w-7xl mx-auto flex flex-wrap gap-4 p-3 text-sm">

                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <a href="{{ route('dashboard.plants') }}" class="hover:underline">Plants</a>
                <a href="{{ route('dashboard.orders') }}" class="hover:underline">Orders</a>
                <a href="{{ route('messages.index') }}" class="hover:underline">Messages</a>
                <a href="{{ route('dashboard.favorites') }}" class="hover:underline">Favorites</a>
                <a href="{{ route('dashboard.settings') }}" class="hover:underline">Settings</a>

            </div>
        </nav>
    </header>

    <!-- MAIN PAGE CONTENT -->
    <main class="max-w-7xl mx-auto p-6">
        @yield('content')
    </main>

</body>
</html>
