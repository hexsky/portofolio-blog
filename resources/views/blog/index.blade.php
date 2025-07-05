@extends('layouts.public')

@section('content')
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Blog</h1>
        <p class="mt-4 text-lg text-gray-600">Kumpulan tulisan, catatan, dan pemikiran saya.</p>
    </div>

    <div class="space-y-8 max-w-4xl mx-auto">
        @forelse ($posts as $post)
            {{-- Kartu untuk setiap postingan --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($post->image)
                    <a href="{{ route('blog.show', $post->slug) }}">
                        <img src="{{ asset('images/posts/'.$post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
                    </a>
                @endif
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-2">
                        <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-indigo-600 transition duration-300">{{ $post->title }}</a>
                    </h2>
                    <p class="text-sm text-gray-500 mb-4">
                        Oleh {{ $post->user->name }} pada {{ $post->created_at->format('d F Y') }}
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        {{ Str::limit(strip_tags($post->content), 250) }}
                    </p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold mt-4 inline-block">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
        @empty
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada postingan yang dipublikasikan.</p>
            </div>
        @endforelse

        {{-- Link Paginasi --}}
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
