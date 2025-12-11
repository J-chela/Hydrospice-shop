@extends('layouts.app')

@section('content')
<div class="min-h-screen p-10 bg-gray-50">

    <!-- Category Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            {{ $category->name }}
        </h1>
        <p class="text-gray-600 mt-1">
            Explore all products in {{ $category->name }}.
        </p>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @forelse ($products as $product)
            <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg transition">

                <!-- Product Image -->
                <a href="{{ route('product.show', $product->slug) }}">
                    <img src="{{ asset('storage/' . $product->image) }}"
                        class="w-full h-40 object-cover rounded-lg"
                        alt="{{ $product->name }}">
                </a>

                <!-- Product Name -->
                <h3 class="mt-3 font-semibold text-gray-800">
                    {{ $product->name }}
                </h3>

                <!-- Price -->
                <p class="text-gray-600 mt-1">
                    KSh {{ number_format($product->price) }}
                </p>

                <!-- Flash Sale -->
                @if($product->is_flash_sale)
                    <span class="inline-block mt-2 text-xs font-bold text-red-600 bg-red-100 px-2 py-1 rounded">
                        Flash Sale!
                    </span>
                @endif

                <!-- View Product Button -->
                <a href="{{ route('product.show', $product->slug) }}"
                   class="mt-3 inline-block w-full bg-green-600 hover:bg-green-700
                          text-white py-2 rounded-lg text-center transition">
                    View Product
                </a>
            </div>

        @empty
            <p class="col-span-full text-gray-600 text-center">
                No products found in this category.
            </p>
        @endforelse

    </div>

    <!-- Pagination -->
    @if($products instanceof \Illuminate\Pagination\AbstractPaginator)
        <div class="mt-10">
            {{ $products->links() }}
        </div>
    @endif

</div>
@endsection

