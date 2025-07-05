@extends('layouts.public')

@section('content')
    {{-- Bagian Hero/Jumbotron --}}
    <div class="bg-white rounded-lg shadow-lg p-8 text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Selamat Datang di Portofolio Saya</h1>
        <p class="mt-4 text-lg text-gray-600">Saya adalah seorang kreator yang bersemangat dalam Desain dan Pengembangan Web.</p>
        <div class="mt-8">
            <a href="{{ route('portfolio.public') }}" class="inline-block bg-indigo-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-indigo-700 transition duration-300">
                Lihat Semua Portofolio
            </a>
        </div>
    </div>

    {{-- Bagian Portofolio Terbaru --}}
    <section class="mb-12">
        <h2 class="text-3xl font-bold text-center mb-8">Portofolio Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($portfolios as $portfolio)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-1 transition-transform duration-300">
                    <img src="{{ asset('images/portfolios/'.$portfolio->image) }}" alt="{{ $portfolio->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $portfolio->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($portfolio->description, 100) }}</p>
                        <span class="inline-block bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $portfolio->category }}</span>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-3">Belum ada item portofolio.</p>
            @endforelse
        </div>
    </section>

    {{-- Bagian Blog Terbaru --}}
    <section>
        <h2 class="text-3xl font-bold text-center mb-8">Tulisan Terbaru</h2>
        <div class="space-y-6 max-w-4xl mx-auto">
            @forelse ($posts as $post)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold">{{ $post->title }}</h3>
                    <p class="text-sm text-gray-500 mt-1">Oleh {{ $post->user->name }} pada {{ $post->created_at->format('d F Y') }}</p>
                    <p class="text-gray-700 mt-4">{{ Str::limit(strip_tags($post->content), 200) }}</p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold mt-4 inline-block">Baca Selengkapnya →</a>
                </div>
            @empty
                <p class="text-center text-gray-500">Belum ada postingan blog.</p>
            @endforelse
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('blog.public') }}" class="text-gray-700 font-semibold hover:text-indigo-600">Lihat Semua Tulisan</a>
        </div>
    </section>
@endsection
