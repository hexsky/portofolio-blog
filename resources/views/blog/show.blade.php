@extends('layouts.public')

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <article>
                {{-- Header Artikel --}}
                <header class="mb-4">
                    <h1 class="fw-bolder mb-1 display-5">{{ $post->title }}</h1>
                    <div class="text-muted fst-italic mb-2">
                        Diposting pada {{ $post->created_at->format('d F Y') }} oleh {{ $post->user->name }}
                    </div>
                </header>

                {{-- Gambar Utama --}}
                @if($post->image)
                    <figure class="mb-4">
                        <img class="img-fluid rounded" src="{{ asset('images/posts/'.$post->image) }}" alt="{{ $post->title }}" />
                    </figure>
                @endif
                
                {{-- Isi Konten --}}
                <section class="mb-5 fs-5">
                    {{-- Gunakan {!! !!} untuk merender HTML jika konten Anda menggunakan editor WYSIWYG --}}
                    {!! nl2br(e($post->content)) !!}
                </section>
            </article>

            <a href="{{ route('blog.public') }}" class="btn btn-outline-dark">← Kembali ke Blog</a>
        </div>
    </div>
@endsection
