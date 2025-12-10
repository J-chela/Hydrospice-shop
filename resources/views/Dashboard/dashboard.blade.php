@extends('layouts.app')

@section('content')

<style>
    .tooltip {
        position: absolute;
        left: 100%;
        top: 50%;
        transform: translateY(-50%) translateX(10px);
        background-color: #4ADE80;
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.875rem;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.2s, transform 0.2s;
    }
    .group:hover .tooltip {
        opacity: 1;
        transform: translateY(-50%) translateX(0);
    }
</style>

<div class="flex bg-gray-100">

    <!-- SIDEBAR -->
    <aside class="w-20 bg-white shadow-lg flex flex-col items-center py-6 space-y-6">

        <div class="text-3xl">🌿</div>

        <nav class="flex flex-col items-center space-y-6 text-2xl">

            <a href="#" class="relative group p-3 rounded-xl hover:bg-green-100 transition">
                🏠
                <span class="tooltip">Dashboard</span>
            </a>

            <a href="#" class="relative group p-3 rounded-xl hover:bg-green-100 transition">
                📦
                <span class="tooltip">Orders</span>
            </a>

            <a href="#" class="relative group p-3 rounded-xl hover:bg-green-100 transition">
                💬
                <span class="tooltip">Messages</span>
            </a>

            <a href="#" class="relative group p-3 rounded-xl hover:bg-green-100 transition">
                💳
                <span class="tooltip">Payments</span>
            </a>

            <a href="#" class="relative group p-3 rounded-xl hover:bg-green-100 transition">
                ⚙️
                <span class="tooltip">Settings</span>
            </a>

        </nav>

        <div class="mt-auto text-2xl">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="relative group p-3 rounded-xl hover:bg-red-100 transition">
                    🚪
                    <span class="tooltip">Logout</span>
                </button>
            </form>
        </div>

    </aside>

    <main class="flex-1 p-10">
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-2">
                Welcome, {{ Auth::user()->name }} 🌱
            </h3>

            <p class="text-gray-600 mb-6">This is your HydroSpice dashboard.</p>
            <p class="text-gray-700">Dashboard content goes here…</p>

        </div>
    </main>

</div>

@endsection
