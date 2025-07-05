@extends('layouts.public')

@section('content')
    <div class="text-center mb-5">
        <h1 class="display-4">Portofolio Saya</h1>
        <p class="lead text-muted">Berikut adalah beberapa karya yang pernah saya buat.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($portfolios as $portfolio)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/portfolios/'.$portfolio->image) }}" class="card-img-top" alt="{{ $portfolio->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $portfolio->title }}</h5>
                        <p class="card-text">{{ $portfolio->description }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{ $portfolio->category }}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-secondary text-center">
                    Belum ada item portofolio yang dipublikasikan.
                </div>
            </div>
        @endforelse
    </div>
@endsection
