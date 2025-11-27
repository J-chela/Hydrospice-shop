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

            <a href="{{ route('favorites') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                💚 <span class="ml-2">My Favorites</span>
            </a>

            <a href="{{ route('orders') }}" class="flex items-center p-3 bg-yellow-100 hover:bg-yellow-200 rounded-lg">
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
                🛒 My Orders
            </h2>

            <h3 class="text-lg font-semibold mb-4 text-gray-900">
                Your Recent Orders
            </h3>

            <p class="text-gray-600 mb-6">
                View your current and past orders below.
            </p>

            <!-- ORDER LIST -->
            <div class="space-y-4">

                <div class="border p-4 rounded-lg hover:bg-gray-50 transition">
                    <div class="flex justify-between">
                        <p><strong>Order #12345</strong> – Basil Seeds 🌿</p>
                        <span class="text-green-600 font-semibold">Delivered</span>
                    </div>
                    <p class="text-sm text-gray-500">Placed on Oct 20, 2025</p>
                </div>

                <div class="border p-4 rounded-lg hover:bg-gray-50 transition">
                    <div class="flex justify-between">
                        <p><strong>Order #12346</strong> – Rosemary Plant 🌱</p>
                        <span class="text-yellow-600 font-semibold">In Transit</span>
                    </div>
                    <p class="text-sm text-gray-500">Placed on Nov 3, 2025</p>
                </div>

            </div>

        </div>
    </main>

</div>
@endsection
