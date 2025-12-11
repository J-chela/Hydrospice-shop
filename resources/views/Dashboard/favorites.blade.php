@extends('layouts.app')

@section('content')
<div class="min-h-screen flex bg-gray-50">

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-10">
        <div class="bg-white shadow rounded-lg p-6">

            <h2 class="text-xl font-semibold leading-tight text-gray-800 mb-6">
                💚 My Favorites
            </h2>

            <h3 class="text-lg font-semibold mb-4 text-gray-900">
                Your Saved Herbs, Succulents, Spices, Seedlings & Crops
            </h3>

            <p class="text-gray-600 mb-6">
                Keep track of the plants and items you love most.
            </p>

            <!-- FAVORITE ITEMS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                <!-- HERB -->
                <div class="border p-4 rounded-lg text-center hover:bg-green-50 transition">
                    <p class="text-3xl">🌿</p>
                    <h4 class="font-semibold text-gray-800">Rosemary</h4>
                    <p class="text-sm text-gray-600">Aromatic herb for cooking & healing</p>
                </div>

                <!-- SUCCULENT -->
                <div class="border p-4 rounded-lg text-center hover:bg-green-50 transition">
                    <p class="text-3xl">🌵</p>
                    <h4 class="font-semibold text-gray-800">Aloe Vera</h4>
                    <p class="text-sm text-gray-600">Great for skin care & indoor décor</p>
                </div>

                <!-- SPICE -->
                <div class="border p-4 rounded-lg text-center hover:bg-green-50 transition">
                    <p class="text-3xl">🌶️</p>
                    <h4 class="font-semibold text-gray-800">Turmeric</h4>
                    <p class="text-sm text-gray-600">Healthy spice packed with benefits</p>
                </div>

                <!-- SEEDLING -->
                <div class="border p-4 rounded-lg text-center hover:bg-green-50 transition">
                    <p class="text-3xl">🌱</p>
                    <h4 class="font-semibold text-gray-800">Tomato Seedlings</h4>
                    <p class="text-sm text-gray-600">Ready for planting in your garden</p>
                </div>

                <!-- CROP -->
                <div class="border p-4 rounded-lg text-center hover:bg-green-50 transition">
                    <p class="text-3xl">🌾</p>
                    <h4 class="font-semibold text-gray-800">Maize</h4>
                    <p class="text-sm text-gray-600">Essential crop for home & farm</p>
                </div>

            </div>

        </div>
    </main>

</div>
@endsection


