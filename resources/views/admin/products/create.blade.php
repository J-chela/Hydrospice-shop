@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto py-8">

    <h1 class="text-2xl font-bold mb-6">Add Product</h1>

    <form method="POST"
          action="{{ route('admin.products.store') }}"
          enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label>Name</label>
            <input name="name" class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label>Category</label>
            <select name="category_id" class="w-full border p-2" required>
                <option value="">Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label>Stock</label>
            <input type="number" name="stock" class="w-full border p-2">
        </div>

        <div class="mb-4">
            <label>Image</label>
            <input type="file" name="image">
        </div>

        <div class="mb-4">
            <label>Description</label>
            <textarea name="description" class="w-full border p-2"></textarea>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Save Product
        </button>

        <a href="{{ route('admin.products.index') }}" class="ml-3">
            Cancel
        </a>

    </form>

</div>
@endsection
