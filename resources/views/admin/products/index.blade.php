@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto py-8">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Products</h1>

        <a href="{{ route('admin.products.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded">
            + Add Product
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 text-left">Name</th>
                <th class="p-2">Category</th>
                <th class="p-2">Price</th>
                <th class="p-2">Stock</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr class="border-t">
                    <td class="p-2">{{ $product->name }}</td>
                    <td class="p-2 text-center">{{ $product->category->name ?? '-' }}</td>
                    <td class="p-2 text-center">{{ number_format($product->price, 2) }}</td>
                    <td class="p-2 text-center">{{ $product->stock }}</td>
                    <td class="p-2 text-center flex justify-center gap-2">
                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="text-blue-600">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('admin.products.destroy', $product) }}"
                              onsubmit="return confirm('Delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">
                        No products yet.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        {{ $products->links() }}
    </div>

</div>
@endsection
