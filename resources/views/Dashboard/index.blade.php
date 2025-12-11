@extends('layouts.app')

@section('content')
<div class="min-h-screen p-10 bg-gray-50">

    <!-- Welcome Box -->
    <div class="bg-white shadow rounded-lg p-6 w-full mb-6">
        <h3 class="text-2xl font-semibold text-gray-800">
            Welcome, {{ Auth::user()->name }} 🌿
        </h3>
        <p class="text-gray-600 mt-1">
            Explore your farming marketplace — seedlings, seeds, herbs, spices & more.
        </p>
    </div>

    <!-- Category Section -->
    <div class="bg-white shadow rounded-lg p-6 w-full">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">
            Explore Categories
        </h2>

        @if($categories->count() > 0)

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">

                @foreach($categories as $category)
                    <a href="{{ route('categories.show', $category->slug) }}"
                       class="block bg-gray-100 hover:bg-white border border-gray-200
                              shadow-sm hover:shadow-md transition-all duration-200
                              rounded-xl p-5 text-center">

                        <div class="text-4xl mb-3">
                            {{ $category->icon ?? '🌱' }}
                        </div>

                        <div class="font-semibold text-gray-800">
                            {{ $category->name }}
                        </div>

                    </a>
                @endforeach

            </div>

        @else
            <p class="text-gray-600">No categories available yet.</p>
        @endif

    </div>

</div>
@endsection

