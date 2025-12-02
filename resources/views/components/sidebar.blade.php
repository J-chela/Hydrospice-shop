<aside class="w-20 bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700 flex flex-col items-center py-6 space-y-6">

    {{-- Dashboard --}}
    <a href="{{ route('dashboard') }}"
       class="text-3xl hover:scale-110 transition">
        🏠
    </a>

    {{-- Orders --}}
    <a href="{{ route('dashboard.orders') }}"
       class="text-3xl hover:scale-110 transition">
        📦
    </a>

    {{-- Favorites --}}
    <a href="{{ route('dashboard.favorites') }}"
       class="text-3xl hover:scale-110 transition">
        ⭐
    </a>

    {{-- Messages --}}
    <a href="{{ route('dashboard.messages.index') }}"
       class="text-3xl hover:scale-110 transition">
        💬
    </a>

    {{-- Settings (main settings page ONLY) --}}
    <a href="{{ route('dashboard.settings') }}"
       class="text-3xl hover:scale-110 transition">
        ⚙️
    </a>

</aside>
