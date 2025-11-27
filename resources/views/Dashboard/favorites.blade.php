@extends('layouts.app')

@section('content')
<div class="min-h-screen flex bg-gray-50">

    <!-- LEFT SIDEBAR -->
    <aside class="w-64 bg-white shadow-lg p-6 space-y-6">

        <h2 class="text-xl font-semibold text-gray-800">
            User Dashboard
        </h2>

        <nav class="space-y-3">
            <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                🏠 <span class="ml-2">Dashboard</span>
            </a>

            <a href="{{ route('favorites') }}" class="flex items-center p-3 bg-green-100 hover:bg-green-200 rounded-lg">
                💚 <span class="ml-2">My Favorites</span>
            </a>

            <a href="{{ route('orders') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                🛒 <span class="ml-2">My Orders</span>
            </a>

            <a href="{{ route('settings') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                ⚙️ <span class="ml-2">Settings</span>
            </a>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-10">
        <div class="bg-white shadow rounded-lg p-6">

            <h2 class="text-xl font-semibold leading-tight text-gray-800 mb-6">
                💚 My Favorites
            </h2>

            <h3 class="text-lg font-semibold mb-4 text-gray-900">
                Your Saved Herbs & Spices
            </h3>

            <p class="text-gray-600 mb-6">
                Keep track of the plants and spices you love most.
            </p>

            <!-- FAVORITE ITEMS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                <div class="border p-4 rounded-lg text-center hover:bg-green-50 transition">
                    <p class="text-3xl">🌿</p>
                    <h4 class="font-semibold text-gray-800">Basil</h4>
                    <p class="text-sm text-gray-600">Perfect for pesto & salads</p>
                </div>

                <div class="border p-4 rounded-lg text-center hover:bg-green-50 transition">
                    <p class="text-3xl">🌶️</p>
                    <h4 class="font-semibold text-gray-800">Chili Pepper</h4>
                    <p class="text-sm text-gray-600">Add spice to your dishes</p>
                </div>

                <div class="border p-4 rounded-lg text-center hover:bg-green-50 transition">
                    <p class="text-3xl">🌿</p>
                    <h4 class="font-semibold text-gray-800">Mint</h4>
                    <p class="text-sm text-gray-600">Refreshing aroma & flavor</p>
                </div>

            </div>

        </div>
    </main>

</div>
@endsection
