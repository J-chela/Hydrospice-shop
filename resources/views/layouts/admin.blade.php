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

<body class="min-h-screen bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">

<div class="flex min-h-screen">

    <!-- ADMIN SIDEBAR -->
    <aside class="w-20 bg-white dark:bg-gray-900 shadow-lg flex flex-col items-center py-6 space-y-8 border-r border-gray-200 dark:border-gray-700">

        <!-- Admin Logo/Brand -->
        <div class="text-center">
            <div class="text-3xl mb-1">👑</div>
            <div class="text-xs font-semibold text-gray-500 dark:text-gray-400">ADMIN</div>
        </div>

        <nav class="flex flex-col items-center space-y-8 text-2xl flex-1">

            <!-- ADMIN DASHBOARD -->
            <a href="/admin" class="relative group text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                <span>📊</span>
                <span class="tooltip">Dashboard</span>
            </a>

            <!-- USERS MANAGEMENT -->
            <a href="/admin/users" class="relative group text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                <span>👥</span>
                <span class="tooltip">Users</span>
            </a>


            <!-- CATEGORIES -->
            <a href="/admin/categories" class="relative group text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                <span>🏷️</span>
                <span class="tooltip">Categories</span>
            </a>

            <!-- ALL ORDERS -->
            <a href="/admin/products" class="relative group text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                <span>📦</span>
                <span class="tooltip">
                    Products
                    <span class="admin-badge">All</span>
                </span>
            </a>


            <!-- SETTINGS -->
            <a href="/admin/settings" class="relative group text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                <span>⚙️</span>
                <span class="tooltip">Settings</span>
            </a>

        </nav>

        <!-- ADMIN PROFILE / LOGOUT -->
        <div class="mt-auto space-y-6">
           
            
            <!-- Admin Profile -->
            <a href="/admin/profile" class="relative group block">
                <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center text-lg">
                    <span>👤</span>
                </div>
                <span class="tooltip">Profile</span>
            </a>
            
            <!-- Logout -->
            <a href="/logout" class="relative group text-red-500 hover:text-red-600">
                <span>🚪</span>
                <span class="tooltip">Logout</span>
            </a>
        </div>

    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 p-6">
        <!-- Admin Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">@yield('title', 'Admin Panel')</h1>
            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mt-2">
                <a href="/admin/" class="hover:text-indigo-600 dark:hover:text-indigo-400">Dashboard</a>
                @hasSection('breadcrumbs')
                    <span class="mx-2">›</span>
                    @yield('breadcrumbs')
                @endif
            </div>
        </div>
        
        <!-- Quick Stats Bar (Optional) -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                <div class="text-sm text-gray-500 dark:text-gray-400">Total Users</div>
                <div class="text-2xl font-bold">1,234</div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                <div class="text-sm text-gray-500 dark:text-gray-400">Today's Orders</div>
                <div class="text-2xl font-bold">42</div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                <div class="text-sm text-gray-500 dark:text-gray-400">Pending</div>
                <div class="text-2xl font-bold text-yellow-600">18</div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                <div class="text-sm text-gray-500 dark:text-gray-400">Revenue</div>
                <div class="text-2xl font-bold text-green-600">$5,678</div>
            </div>
        </div>
        
        <!-- Content -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
            @yield('content')
        </div>
    </main>

</div>

<!-- Tooltip CSS (Same as user side) -->
<style>
.tooltip {
    position: absolute;
    left: 100%;
    top: 50%;
    transform: translateY(-50%) translateX(10px);
    background-color: #4F46E5;
    color: white;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 0.875rem;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.2s, transform 0.2s;
    z-index: 50;
    min-width: 100px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}
.group:hover .tooltip {
    opacity: 1;
    transform: translateY(-50%) translateX(0);
}

/* Dark mode tooltip */
.dark .tooltip {
    background-color: #3730A3;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .tooltip {
        display: none; /* Hide tooltips on mobile */
    }
    
    aside {
        width: 60px;
    }
}
</style>

<!-- Theme Script (Same as user side) -->
<script>
(function setInitialTheme() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.documentElement.classList.add('dark');
    }
})();

// Add admin-specific scripts if needed
document.addEventListener('DOMContentLoaded', function() {
    // Example: Highlight current page in sidebar
    const currentPath = window.location.pathname;
    document.querySelectorAll('aside a').forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('text-indigo-600', 'dark:text-indigo-400');
            link.classList.remove('text-gray-700', 'dark:text-gray-300');
        }
    });
});
</script>

</body>
</html>