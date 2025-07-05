@extends('layouts.public')

@section('content')
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-gray-100">Portofolio Saya</h1>
        <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">Berikut adalah beberapa karya yang pernah saya buat.</p>
    </div>

    {{-- Grid untuk menampilkan item portofolio --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($portfolios as $portfolio)
            {{-- Kartu untuk setiap item --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform hover:-translate-y-1 transition-transform duration-300">
                {{-- Gambar Portofolio --}}
                <img src="{{ asset('images/portfolios/'.$portfolio->image) }}" alt="{{ $portfolio->title }}" class="w-full h-56 object-cover">
                
                {{-- Konten Kartu --}}
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">{{ $portfolio->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">{{ $portfolio->description }}</p>
                    
                    {{-- Kategori sebagai 'badge' --}}
                    <span class="inline-block bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $portfolio->category }}</span>
                </div>
            </div>
        @empty
            {{-- Pesan jika tidak ada data --}}
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-500 dark:text-gray-400 text-lg">Belum ada item portofolio yang dipublikasikan.</p>
            </div>
        @endforelse
    </div>
@endsection
