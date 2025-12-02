<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HydroSpice Shop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900">

    <!-- TOP NAVBAR -->
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between p-4">

            <!-- LOGO -->
            <h1 class="text-2xl font-bold text-green-700">
                HydroSpice-Shop
            </h1>

            <!-- SEARCH BAR -->
            <div class="flex-1 mx-6">
                <input type="text"
                       placeholder="Search for products..."
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-green-500">
            </div>

            <!-- ICONS -->
            <div class="flex items-center space-x-6">

                <!-- Cart Icon -->
                <a href="#" class="text-xl">🛒</a>

                <!-- Profile Icon -->
                <div class="relative group">
                    <button type="button" class="text-xl">👤</button> <!-- FIXED -->

                    <!-- Dropdown -->
                    <div class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-lg hidden group-hover:block p-2">
                        <a href="{{ route('dashboard') }}" class="block px-3 py-2 hover:bg-gray-100">Dashboard</a>
                        <a href="{{ route('profile.edit') }}" class="block px-3 py-2 hover:bg-gray-100">Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left px-3 py-2 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- CATEGORY BAR -->
        <nav class="bg-green-600 text-white">
            <div class="max-w-7xl mx-auto flex space-x-6 p-3">

                <a href="#" class="hover:underline">Flash Sale</a>
                <a href="#" class="hover:underline">All Departments</a>
                <a href="#" class="hover:underline">HydroKit</a>
                <a href="#" class="hover:underline">Seeds & Seedlings</a>
                <a href="#" class="hover:underline">Produce</a>
                <a href="#" class="hover:underline">Spices / Powder</a>

            </div>
        </nav>
    </header>

    <!-- MAIN PAGE CONTENT -->
    <main class="max-w-7xl mx-auto p-6">
        @yield('content')
    </main>

</body>
</html>
