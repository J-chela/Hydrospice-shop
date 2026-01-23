@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-8">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Categories</h1>

        <a href="{{ route('admin.categories.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded">
            + Add Category
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Slug</th>
                <th class="p-2 border w-40">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td class="p-2 border">{{ $category->name }}</td>
                    <td class="p-2 border text-sm text-gray-600">{{ $category->slug }}</td>
                    <td class="p-2 border flex gap-2">

                        <a href="{{ route('admin.categories.edit', $category) }}"
                           class="text-blue-600">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('admin.categories.delete', $category) }}"
                              onsubmit="return confirm('Delete this category?')">
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
                    <td colspan="3" class="p-4 text-center text-gray-500">
                        No categories found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
