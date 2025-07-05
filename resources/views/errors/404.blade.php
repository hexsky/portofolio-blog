<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Halaman Tidak Ditemukan</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Skrip untuk Dark Mode -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="antialiased font-sans">
    <div class="bg-gray-100 dark:bg-gray-900">
        <div class="flex items-center justify-center min-h-screen">
            <div class="text-center p-8">
                <h1 class="text-8xl md:text-9xl font-extrabold text-indigo-600 dark:text-indigo-400">404</h1>
                <h2 class="mt-4 text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">Halaman Tidak Ditemukan</h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400">Maaf, kami tidak dapat menemukan halaman yang Anda cari.</p>
                <div class="mt-8">
                    <a href="{{ url('/') }}" class="inline-block bg-indigo-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-indigo-700 transition duration-300">
                        Kembali ke Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
