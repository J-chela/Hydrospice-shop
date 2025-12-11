@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 p-8">

    <!-- Product Container -->
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">

        <!-- Product Image -->
        <div class="bg-white p-6 rounded-xl shadow">
            <img src="{{ asset('storage/' . $product->image) }}"
                 alt="{{ $product->name }}"
                 class="w-full h-96 object-cover rounded-lg">
        </div>

        <!-- Product Details -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h1 class="text-3xl font-semibold text-gray-800">{{ $product->name }}</h1>

            <p class="text-green-600 text-2xl mt-3 font-bold">
                KSh {{ number_format($product->price) }}
            </p>

            <p class="mt-4 text-gray-600 leading-relaxed">
                {{ $product->description }}
            </p>

            <!-- Category link -->
            <a href="{{ route('categories.show', $product->category->slug) }}"
               class="mt-3 inline-block text-sm text-blue-600 hover:underline">
                {{ $product->category->name }}
            </a>

            <!-- Add to Cart Button -->
            <button
                class="mt-6 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">
                Add to Cart
            </button>
        </div>
    </div>

    <!-- Related Products -->
    @if($related->count())
    <div class="max-w-6xl mx-auto mt-16">
        <h2 class="text-xl font-semibold mb-4">Related Products</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($related as $item)
            <a href="{{ route('product.show', $item->slug) }}"
                class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">

                <img src="{{ asset('storage/' . $item->image) }}"
                     class="h-40 w-full object-cover rounded">

                <p class="mt-2 font-semibold text-gray-700">{{ $item->name }}</p>
                <p class="text-green-600 text-sm">KSh {{ number_format($item->price) }}</p>
            </a>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection

