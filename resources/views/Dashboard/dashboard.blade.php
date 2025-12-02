@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">

    <!-- SIDEBAR -->
    <aside class="w-20 bg-white shadow-lg flex flex-col items-center py-6 space-y-6">

        <!-- Logo -->
        <div class="text-3xl">🌿</div>

        <!-- Menu Icons Only -->
        <nav class="flex flex-col items-center space-y-6 text-2xl">

            <a href="#" class="p-3 rounded-xl hover:bg-green-100 transition" title="Dashboard">
                🏠
            </a>

            <a href="#" class="p-3 rounded-xl hover:bg-green-100 transition" title="Orders">
                📦
            </a>

            <a href="#" class="p-3 rounded-xl hover:bg-green-100 transition" title="Messages">
                💬
            </a>

            <a href="#" class="p-3 rounded-xl hover:bg-green-100 transition" title="Payments">
                💳
            </a>

            <a href="#" class="p-3 rounded-xl hover:bg-green-100 transition" title="Account Settings">
                ⚙️
            </a>

        </nav>

        <!-- Logout -->
        <div class="mt-auto text-2xl">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="p-3 rounded-xl hover:bg-red-100 transition" title="Logout">
                    🚪
                </button>
            </form>
        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-10">

        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-2">
                Welcome, {{ Auth::user()->name }} 🌱
            </h3>

            <p class="text-gray-600 mb-6">
                This is your HydroSpice dashboard.
            </p>

            <p class="text-gray-700">
                Dashboard content goes here…
            </p>
        </div>

    </main>

</div>
@endsection
