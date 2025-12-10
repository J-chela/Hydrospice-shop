<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-20 bg-white dark:bg-gray-900 shadow-lg flex flex-col items-center py-6 space-y-8">

        <div class="text-3xl">🌿</div>

        <nav class="flex flex-col items-center space-y-8 text-2xl">

            <!-- DASHBOARD -->
            <a href="/dashboard" class="relative group text-gray-700 dark:text-gray-300">
                <span>🏠</span>
                <span class="tooltip">Dashboard</span>
            </a>

            <!-- PLANTS -->
            <a href="/dashboard/plants" class="relative group text-gray-700 dark:text-gray-300">
                <span>🪴</span>
                <span class="tooltip">Plants</span>
            </a>

            <!-- ORDERS -->
            <a href="/dashboard/orders" class="relative group text-gray-700 dark:text-gray-300">
                <span>📦</span>
                <span class="tooltip">Orders</span>
            </a>

            <!-- MESSAGES -->
            <a href="/messages" class="relative group text-gray-700 dark:text-gray-300">
                <span>💬</span>
                <span class="tooltip">Messages</span>
            </a>

            <!-- FAVORITES -->
            <a href="/dashboard/favorites" class="relative group text-gray-700 dark:text-gray-300">
                <span>⭐</span>
                <span class="tooltip">Favorites</span>
            </a>

            <!-- SETTINGS -->
            <a href="/dashboard/settings" class="relative group text-gray-700 dark:text-gray-300">
                <span>⚙️</span>
                <span class="tooltip">Settings</span>
            </a>

        </nav>

    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

<!-- Tooltip CSS -->
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

<!-- Theme Script -->
<script>
(function setInitialTheme() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.documentElement.classList.add('dark');
    }
})();
</script>

</body>
</html>
