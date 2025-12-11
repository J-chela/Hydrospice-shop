@extends('layouts.app')

@section('content')
<div class="min-h-screen p-10 bg-gray-50">

    <!-- Page Title -->
    <div class="flex items-center space-x-3 mb-8">
        <span class="text-3xl">🌿</span>
        <h1 class="text-3xl font-bold text-gray-700">Plants Page</h1>
    </div>

    <!-- Search -->
    <div class="mb-8">
        <input 
            type="text"
            placeholder="Search plants..."
            class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-400"
        >
    </div>

    <!-- CATEGORY GRID -->
    <h2 class="text-xl font-semibold mb-3 text-gray-600">Categories</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-5 mb-12">
        @foreach ([  
            ['icon' => '🌱', 'name' => 'Herbs'],
            ['icon' => '🌸', 'name' => 'Flowers'],
            ['icon' => '🌵', 'name' => 'Succulents'],
            ['icon' => '🌶️', 'name' => 'Spices'],
            ['icon' => '🌱', 'name' => 'Seedlings'],
            ['icon' => '🌾', 'name' => 'Crops'],
        ] as $category)
            <div class="bg-white shadow rounded-xl p-6 text-center cursor-pointer hover:shadow-lg transition">
                <div class="text-4xl mb-3">{{ $category['icon'] }}</div>
                <p class="font-semibold text-gray-700">{{ $category['name'] }}</p>
            </div>
        @endforeach
    </div>

    <!-- PLANTS GRID -->
    <h2 class="text-xl font-semibold mb-3 text-gray-600">Your Plants</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-8">

        @foreach ([  
            ['name' => 'Aloe Vera', 'img' => 'https://placehold.co/300x200?text=Aloe', 'category' => 'Succulent'],
            ['name' => 'Rosemary', 'img' => 'https://placehold.co/300x200?text=Rosemary', 'category' => 'Herb'],
            ['name' => 'Marigold', 'img' => 'https://placehold.co/300x200?text=Marigold', 'category' => 'Flower'],
            ['name' => 'Turmeric', 'img' => 'https://placehold.co/300x200?text=Turmeric', 'category' => 'Spice'],
        ] as $plant)
            <div class="bg-white shadow rounded-xl overflow-hidden hover:shadow-xl transition cursor-pointer">
                <img src="{{ $plant['img'] }}" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-gray-700 text-lg">{{ $plant['name'] }}</h3>
                    <p class="text-sm text-gray-500 mt-1">{{ $plant['category'] }}</p>
                </div>
            </div>
        @endforeach

    </div>

</div>
@endsection


