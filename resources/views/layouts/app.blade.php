<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Advanced Project')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">

    <header class="bg-white shadow-sm sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">
                <a href="{{ url('/') }}">Advanced Project</a>
            </h1>

            <nav class="space-x-4">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-500 font-medium transition">Home</a>
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-500 font-medium transition">Countries</a>
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-500 font-medium transition">Posts</a>
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-500 font-medium transition">Videos</a>
                <!-- Add more links as needed -->
            </nav>
        </div>
    </header>

    <main class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <footer class="text-center text-gray-500 text-sm py-6 border-t mt-12">
        &copy; {{ date('Y') }} Advanced Project. All rights reserved.
    </footer>
</body>
</html>
