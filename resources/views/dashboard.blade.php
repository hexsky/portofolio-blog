<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Anda telah berhasil login ke panel admin.</p>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Statistik Portofolio -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Statistik Portofolio</h4>
                    <p class="mt-2 text-3xl font-bold text-indigo-600 dark:text-indigo-400">{{ $portfolioCount }}</p>
                    <p class="text-gray-600 dark:text-gray-400">Total item portofolio.</p>
                    <a href="{{ route('portfolios.index') }}" class="mt-4 inline-block bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-600 transition duration-300">
                        Kelola Portofolio
                    </a>
                </div>

                <!-- Statistik Blog -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Statistik Blog</h4>
                    <p class="mt-2 text-3xl font-bold text-teal-600 dark:text-teal-400">{{ $postCount }}</p>
                    <p class="text-gray-600 dark:text-gray-400">Total postingan blog.</p>
                    <a href="{{ route('posts.index') }}" class="mt-4 inline-block bg-teal-500 text-white font-bold py-2 px-4 rounded hover:bg-teal-600 transition duration-300">
                        Kelola Blog
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
