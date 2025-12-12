@extends('layouts.app')

@section('content')
<div class="min-h-screen flex bg-gray-50">


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

