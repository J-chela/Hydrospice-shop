@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- CATEGORY HEADER -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">{{ $category->name }}</h1>
        <p class="text-gray-500 mt-1">
            Showing products in <strong>{{ $category->name }}</strong>
        </p>
    </div>

    <!-- CATEGORY IMAGE (optional) -->
    @if($category->image)
        <div class="mb-10">
            <img src="{{ asset('storage/' . $category->image) }}"
                 class="w-full h-56 object-cover rounded-xl shadow">
        </div>
    @endif

    <!-- PRODUCT GRID -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">

        @forelse ($products as $product)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4">
                
                <!-- Product Image -->
                <img src="{{ asset('storage/' . $product->image) }}"
                     class="w-full h-40 object-cover rounded-lg mb-3">

                <!-- Product Name -->
                <h3 class="text-sm font-semibold text-gray-800">
                    {{ $product->name }}
                </h3>

                <!-- Prices -->
                <div class="mt-2">
                    @if($product->discount_price)
                        <span class="text-green-600 font-bold text-lg">
                            KES {{ number_format($product->discount_price) }}
                        </span>
                        <span class="line-through text-gray-400 ml-2">
                            KES {{ number_format($product->price) }}
                        </span>
                    @else
                        <span class="text-gray-800 font-bold text-lg">
                            KES {{ number_format($product->price) }}
                        </span>
                    @endif
                </div>

                <!-- Add to Cart (optional for later) -->
                <button
                    class="mt-3 w-full bg-green-600 text-white py-2 rounded-lg text-sm hover:bg-green-700 transition">
                    Add to Cart
                </button>
            </div>

        @empty
            <p class="col-span-5 text-center text-gray-500">
                No products found in this category.
            </p>
        @endforelse

    </div>

</div>
@endsection

