<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | {{ config('app.name', 'Laravel') }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional admin CSS if needed -->
    <style>
        .admin-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 600;
            margin-left: 4px;
            vertical-align: middle;
        }
        
        .admin-alert {
            border-left: 4px solid #EF4444;
            background-color: #FEF2F2;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .dark .admin-alert {
            background-color: #1F2937;
            border-left-color: #DC2626;
        }
    </style>
</head>

<body class="app-shell">

<div class="flex min-h-screen">

    <!-- ADMIN SIDEBAR -->
    <aside class="hidden md:flex w-24 flex-col items-center gap-5 border-r border-slate-200 bg-white py-6 shadow-sm">

        <!-- Admin Logo/Brand -->
        <div class="text-center">
            <div class="text-3xl mb-1">👑</div>
            <div class="text-xs font-semibold text-slate-500">ADMIN</div>
        </div>

        <nav class="flex flex-col gap-3 text-xl flex-1">

            <!-- ADMIN DASHBOARD -->
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'sidebar-link-active' : '' }}" title="Dashboard">
                <span>📊</span>
            </a>

            <!-- USERS MANAGEMENT -->
            <a href="{{ route('admin.users') }}" class="sidebar-link {{ request()->routeIs('admin.users') ? 'sidebar-link-active' : '' }}" title="Users">
                <span>👥</span>
            </a>


            <!-- CATEGORIES -->
            <a href="{{ route('admin.categories') }}" class="sidebar-link {{ request()->routeIs('admin.categories*') ? 'sidebar-link-active' : '' }}" title="Categories">
                <span>🏷️</span>
            </a>

            <!-- ALL ORDERS -->
            <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products*') ? 'sidebar-link-active' : '' }}" title="Products">
                <span>📦</span>
            </a>

            <a href="{{ route('admin.orders') }}" class="sidebar-link {{ request()->routeIs('admin.orders') ? 'sidebar-link-active' : '' }}" title="Orders">
                <span>🧾</span>
            </a>

            <a href="{{ route('admin.messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.messages*') ? 'sidebar-link-active' : '' }}" title="Messages">
                <span>✉️</span>
            </a>

        </nav>

        <!-- ADMIN PROFILE / LOGOUT -->
        <div class="mt-auto space-y-4">
           
            
            <!-- Admin Profile -->
            <a href="{{ route('profile.edit') }}" class="block">
                <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-lg">
                    <span>👤</span>
                </div>
            </a>
            
            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link text-red-600 hover:bg-red-50 hover:text-red-700" title="Logout">🚪</button>
            </form>
        </div>

    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1">
        <!-- Admin Header -->
        <header class="sticky top-0 z-20 border-b border-slate-200 bg-white/90 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6">
                <h1 class="text-lg font-semibold text-slate-800">@yield('title', 'Admin Panel')</h1>
                <a href="{{ route('home') }}" class="text-sm text-slate-600 hover:text-slate-900">Back to Store</a>
            </div>
        </header>
        <section class="mx-auto max-w-7xl p-4 sm:p-6">
            <div class="mb-6">
                <div class="flex items-center text-sm text-gray-500 mt-2">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
                @hasSection('breadcrumbs')
                    <span class="mx-2">›</span>
                    @yield('breadcrumbs')
                @endif
                </div>
            </div>
            <div class="panel">
            @yield('content')
            </div>
        </div>
        </section>
    </main>

</div>

</body>
</html>