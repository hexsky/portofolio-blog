<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
{{-- 
    PERUBAHAN:
    1. Menambahkan "flex flex-col" untuk mengaktifkan layout flexbox secara vertikal.
    2. Menambahkan "min-h-screen" untuk memastikan body memiliki tinggi minimal setinggi layar.
--}}
<body class="font-sans antialiased bg-gray-100 text-gray-800 flex flex-col min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-xl font-bold text-gray-800">{{ config('app.name', 'Laravel') }}</a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="/" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->is('/') ? 'border-indigo-500' : 'border-transparent' }} text-sm font-medium leading-5 text-gray-900">Home</a>
                    <a href="{{ route('portfolio.public') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('portfolio.public') ? 'border-indigo-500' : 'border-transparent' }} text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300">Portofolio</a>
                    <a href="{{ route('blog.public') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('blog.public') ? 'border-indigo-500' : 'border-transparent' }} text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300">Blog</a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- 
        PERUBAHAN:
        Menambahkan "flex-grow" agar elemen main ini mengambil semua ruang kosong yang tersedia,
        sehingga mendorong footer ke bawah.
    --}}
    <main class="flex-grow max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 w-full">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white mt-auto">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Praktikum Pemrograman Web. Achmad Fitto R.
        </div>
    </footer>

</body>
</html>
