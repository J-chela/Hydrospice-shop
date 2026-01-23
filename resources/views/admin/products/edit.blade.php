@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto py-8">

    <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

    <form method="POST"
          action="{{ route('admin.products.update', $product) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Name</label>
            <input name="name"
                   value="{{ $product->name }}"
                   class="w-full border p-2"
                   required>
        </div>

        <div class="mb-4">
            <label>Category</label>
            <select name="category_id" class="w-full border p-2" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected($product->category_id == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Price</label>
            <input type="number"
                   step="0.01"
                   name="price"
                   value="{{ $product->price }}"
                   class="w-full border p-2">
        </div>

        <div class="mb-4">
            <label>Stock</label>
            <input type="number"
                   name="stock"
                   value="{{ $product->stock }}"
                   class="w-full border p-2">
        </div>

        <div class="mb-4">
            <label>Replace Image</label>
            <input type="file" name="image">
        </div>

        <div class="mb-4">
            <label>Description</label>
            <textarea name="description"
                      class="w-full border p-2">{{ $product->description }}</textarea>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Update Product
        </button>

        <a href="{{ route('admin.products.index') }}" class="ml-3">
            Cancel
        </a>

    </form>

</div>
@endsection
