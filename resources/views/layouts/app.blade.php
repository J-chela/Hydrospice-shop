<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">

    @include('layouts.navigation')

    <div class="min-h-screen">
        @yield('content')
    </div>

    {{-- Dark Mode Script (LocalStorage Only) --}}
    <script>
        // 1. Apply stored theme immediately when page loads
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark');
        }

        // 2. Toggle dark mode
        function toggleTheme() {
            const html = document.documentElement;
            const isDark = html.classList.toggle('dark');
            localStorage.theme = isDark ? 'dark' : 'light';
        }
    </script>

</body>
</html>

