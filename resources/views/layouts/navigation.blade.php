<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    {{-- Dashboard --}}
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    {{-- Orders --}}
                    <x-nav-link :href="route('dashboard.orders')" :active="request()->routeIs('dashboard.orders')">
                        {{ __('Orders') }}
                    </x-nav-link>

                    {{-- Favorites --}}
                    <x-nav-link :href="route('dashboard.favorites')" :active="request()->routeIs('dashboard.favorites')">
                        {{ __('Favorites') }}
                    </x-nav-link>

                    {{-- Settings --}}
                    <x-nav-link :href="route('dashboard.settings')" :active="request()->routeIs('dashboard.settings')">
                        {{ __('Settings') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <!-- caret icon -->
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                     aria-hidden="true" focusable="false">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Profile -->
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                    <!-- Hamburger: shown when menu closed -->
                    <svg x-show="!open" x-cloak class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>

                    <!-- X icon: shown when menu open -->
                    <svg x-show="open" x-cloak class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dashboard.orders')" :active="request()->routeIs('dashboard.orders')">
                {{ __('Orders') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dashboard.favorites')" :active="request()->routeIs('dashboard.favorites')">
                {{ __('Favorites') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dashboard.settings')" :active="request()->routeIs('dashboard.settings')">
                {{ __('Settings') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
                    <p class="text-gray-600 text-sm">View and manage your favorite plants</p>
                </a>

                <a href="{{ route('dashboard.settings') }}" 
                   class="p-6 bg-blue-100 hover:bg-blue-200 rounded-lg text-center transition">
                    <div class="text-3xl mb-2">⚙️</div>
                    <h4 class="text-lg font-semibold text-gray-800">Account Settings</h4>
                    <p class="text-gray-600 text-sm">Update your profile and preferences</p>
                </a>

            </div>
        </div>
    </main>
</div>  

                </nav>
            </aside>

            <!-- MAIN CONTENT -->
            <main class="flex-1 p-10">
                <div class="bg-white shadow-xl rounded-lg p-6">

                    <h2 class="text-xl font-semibold leading-tight text-gray-800 mb-6">
                        🌿 My HydroSpice Dashboard
                    </h2>

                    <!-- Welcome Message -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Welcome back, {{ Auth::user()->name }} 👋
                        </h3>
                        <p class="text-gray-600">
                            Manage your plants, orders, and favorites — all from here.
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        <a href="{{ route('dashboard.orders') }}" 
                           class="p-6 bg-green-100 hover:bg-green-200 rounded-lg text-center transition">
                            <div class="text-3xl mb-2">🛒</div>
                            <h4 class="text-lg font-semibold text-gray-800">My Orders</h4>
                            <p class="text-gray-600 text-sm">Track your spice & plant orders</p>
                        </a>

                        <a href="{{ route('dashboard.favorites') }}" 
                           class="p-6 bg-yellow-100 hover:bg-yellow-200 rounded-lg text-center transition">
                            <div class="text-3xl mb-2">💚</div>
                            <h4 class="text-lg font-semibold text-gray-800">Favorites</h4>
                            <p class="text-gray-600 text-sm">Your saved herbs & spices</p>
                        </a>

                        <a href="{{ route('dashboard.settings') }}" 
                           class="p-6 bg-blue-100 hover:bg-blue-200 rounded-lg text-center transition">
                            <div class="text-3xl mb-2">⚙️</div>
                            <h4 class="text-lg font-semibold text-gray-800">Account Settings</h4>
                            <p class="text-gray-600 text-sm">Update your profile and preferences</p>
                        </a>

                    </div>
                </div>
            </main>
        </div>   </div>
