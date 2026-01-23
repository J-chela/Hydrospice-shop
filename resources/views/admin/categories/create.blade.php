@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto py-8">

    <h1 class="text-2xl font-bold mb-6">Add Category</h1>

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Category Name</label>
            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   class="w-full border p-2 rounded"
                   required>

            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Save Category
        </button>

        <a href="{{ route('admin.categories') }}"
           class="ml-3 text-gray-600">
            Cancel
        </a>
    </form>

</div>
@endsection
