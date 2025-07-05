@extends('layouts.public')

@section('content')
    <div class="max-w-4xl mx-auto">
        <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 md:p-8">
            {{-- Header Artikel --}}
            <header class="mb-6">
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-gray-100 mb-2">{{ $post->title }}</h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm">
                    Diposting pada {{ $post->created_at->format('d F Y') }} oleh <span class="font-semibold">{{ $post->user->name }}</span>
                </p>
            </header>

            {{-- Gambar Utama --}}
            @if($post->image)
                <figure class="mb-6">
                    <img class="w-full h-auto rounded-lg" src="{{ asset('images/posts/'.$post->image) }}" alt="{{ $post->title }}" />
                </figure>
            @endif
            
            {{-- Isi Konten --}}
            <div class="prose prose-lg dark:prose-invert max-w-none leading-relaxed">
                {!! nl2br(e($post->content)) !!}
            </div>
        </article>

        {{-- Tombol Kembali --}}
        <div class="mt-8">
            <a href="{{ route('blog.public') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200 font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Kembali ke Semua Postingan
            </a>
        </div>
    </div>
@endsection
