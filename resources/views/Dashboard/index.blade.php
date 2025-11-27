@extends('layouts.app')

@section('content')
<div class="min-h-screen flex bg-gray-50">

    <!-- LEFT SIDEBAR -->
    <aside class="w-64 bg-white shadow-lg p-6 space-y-6">

        <h2 class="text-xl font-semibold text-gray-800">
            User Dashboard
        </h2>

        <nav class="space-y-3">
            <a href="#" class="flex items-center p-3 bg-green-100 hover:bg-green-200 rounded-lg">
                🌾 <span class="ml-2">My Plants</span>
            </a>

            <a href="#" class="flex items-center p-3 bg-yellow-100 hover:bg-yellow-200 rounded-lg">
                🛒 <span class="ml-2">My Orders</span>
            </a>

            <a href="#" class="flex items-center p-3 bg-blue-100 hover:bg-blue-200 rounded-lg">
                ⚙️ <span class="ml-2">Account Settings</span>
            </a>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-10">

        <div class="bg-white shadow rounded-lg p-6">

            <h3 class="text-lg font-semibold mb-2">
                Welcome, {{ Auth::user()->name }} 🌿
            </h3>

            <p class="text-gray-600 mb-6">
                This is the main dashboard index page.
            </p>

            {{-- Add anything you want inside here --}}
            <p class="text-gray-700">Dashboard content goes here…</p>

        </div>

    </main>

</div>
@endsection
