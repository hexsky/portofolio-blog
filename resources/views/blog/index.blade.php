@extends('layouts.public')

@section('content')
    <div class="text-center mb-5">
        <h1 class="display-4">Blog</h1>
        <p class="lead text-muted">Kumpulan tulisan, catatan, dan pemikiran saya.</p>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            @forelse ($posts as $post)
                <div class="card mb-4 shadow-sm">
                    @if($post->image)
                        <img src="{{ asset('images/posts/'.$post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    @endif
                    <div class="card-body">
                        <h2 class="card-title h4">{{ $post->title }}</h2>
                        <p class="text-muted small">
                            Oleh {{ $post->user->name }} pada {{ $post->created_at->format('d F Y') }}
                        </p>
                        <p class="card-text">
                            {{ Str::limit(strip_tags($post->content), 150) }}
                        </p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary">Baca Selengkapnya →</a>
                    </div>
                </div>
            @empty
                <div class="alert alert-secondary text-center">
                    Belum ada postingan yang dipublikasikan.
                </div>
            @endforelse

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
