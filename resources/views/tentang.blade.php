@extends('layouts.public')

@section('content')
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 md:p-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-gray-100">Tentang Saya</h1>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">Mengenal lebih dekat kreator di balik karya-karya ini.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            <!-- Foto Profil -->
            <div class="md:col-span-1 flex justify-center">
                {{-- Ganti 'images/profile.jpg' dengan path foto Anda di folder public --}}
                <img src="{{ asset('images/profile.jpg') }}" alt="Foto Profil Achmad Fitto R." class="rounded-full h-48 w-48 md:h-64 md:w-64 object-cover shadow-lg">
            </div>

            <!-- Biografi -->
            <div class="md:col-span-2">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">Achmad Fitto R.</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Selamat datang di portofolio digital saya! Saya adalah seorang mahasiswa Informatika UNS dengan hasrat yang mendalam untuk pengembangan web, desain UI/UX, dan teknologi kreatif. Saya percaya bahwa setiap baris kode dan setiap piksel desain memiliki potensi untuk menceritakan sebuah kisah dan menyelesaikan masalah.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Melalui website ini, saya berbagi perjalanan saya dalam belajar dan berkarya. Silakan jelajahi portofolio saya untuk melihat proyek-proyek yang telah saya kerjakan dan kunjungi blog saya untuk membaca pemikiran saya tentang tren teknologi terbaru.
                </p>
            </div>
        </div>

        <!-- Bagian Keahlian (Skills) -->
        <div class="mt-16">
            <h3 class="text-2xl font-bold text-center text-gray-900 dark:text-gray-100 mb-8">Keahlian Utama</h3>
            <div class="flex flex-wrap justify-center gap-4">
                {{-- Ganti dengan keahlian Anda --}}
                <span class="bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300 text-sm font-semibold px-4 py-2 rounded-full">Laravel</span>
                <span class="bg-sky-100 text-sky-800 dark:bg-sky-900 dark:text-sky-300 text-sm font-semibold px-4 py-2 rounded-full">Tailwind CSS</span>
                <span class="bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300 text-sm font-semibold px-4 py-2 rounded-full">JavaScript</span>
                <span class="bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-300 text-sm font-semibold px-4 py-2 rounded-full">UI/UX Design</span>
                <span class="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 text-sm font-semibold px-4 py-2 rounded-full">PHP</span>
            </div>
        </div>
    </div>
@endsection
