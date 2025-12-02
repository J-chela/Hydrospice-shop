<nav x-data="{ open: false }" class="flex">

    <!-- Sidebar -->
    <aside class="w-20 h-screen bg-white dark:bg-gray-900 
                 border-r border-gray-200 dark:border-gray-700
                 flex flex-col items-center py-6">

        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="mb-8" title="Home">
            <x-application-logo class="h-10 w-10 text-gray-800 dark:text-gray-100" />
        </a>

        <!-- Dashboard Title -->
        <h1 class="text-[10px] font-bold tracking-widest 
                   text-gray-500 dark:text-gray-400 mb-6">
            DASHBOARD
        </h1>

        <!-- Emoji Menu -->
        <ul class="flex flex-col space-y-6 text-2xl">

            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}"
                   title="Dashboard"
                   class="hover:scale-125 transition 
                          text-gray-600 dark:text-gray-300
                          @if(request()->routeIs('dashboard')) 
                              text-blue-500 dark:text-blue-400 
                          @endif">
                    🏠
                </a>
            </li>

            <!-- Orders -->
            <li>
                <a href="{{ route('dashboard.orders') }}"
                   title="Orders"
                   class="hover:scale-125 transition 
                          text-gray-600 dark:text-gray-300
                          @if(request()->routeIs('dashboard.orders')) 
                              text-blue-500 dark:text-blue-400 
                          @endif">
                    📦
                </a>
            </li>

            <!-- Favorites -->
            <li>
                <a href="{{ route('dashboard.favorites') }}"
                   title="Favorites"
                   class="hover:scale-125 transition 
                          text-gray-600 dark:text-gray-300
                          @if(request()->routeIs('dashboard.favorites')) 
                              text-blue-500 dark:text-blue-400 
                          @endif">
                    ⭐
                </a>
            </li>

            <!-- Settings -->
            <li>
                <a href="{{ route('dashboard.settings') }}"
                   title="Settings"
                   class="hover:scale-125 transition 
                          text-gray-600 dark:text-gray-300
                          @if(request()->routeIs('dashboard.settings')) 
                              text-blue-500 dark:text-blue-400 
                          @endif">
                    ⚙️
                </a>
            </li>

        </ul>

        <!-- Bottom buttons -->
        <div class="mt-auto flex flex-col items-center space-y-4">

            <!-- Dark Mode Toggle -->
            <button onclick="toggleTheme()"
                    title="Toggle Dark Mode"
                    class="text-xl px-3 py-2 rounded-lg 
                           bg-gray-200 dark:bg-gray-700 
                           text-gray-700 dark:text-gray-200 
                           hover:scale-110 transition">
                🌙
            </button>

            <!-- User Dropdown -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button title="Account Menu"
                            class="text-xl px-3 py-2 rounded-lg 
                                   bg-gray-100 dark:bg-gray-800 
                                   text-gray-700 dark:text-gray-200 
                                   hover:scale-110 transition">
                        👤
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        Profile
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>

        </div>

    </aside>

</nav>

<script>
    function toggleTheme() {
        const html = document.documentElement;
        const dark = html.classList.contains('dark');

        html.classList.toggle('dark', !dark);
        localStorage.setItem('theme', dark ? 'light' : 'dark');
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    });
</script>
