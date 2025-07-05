<x-app-layout>
    {{-- Header Halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item Portofolio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Formulir --}}
                    <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf {{-- Token keamanan Laravel --}}
                        @method('PUT') {{-- Method spoofing untuk update --}}

                        {{-- Input Judul --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $portfolio->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Kategori --}}
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', $portfolio->category) }}" required>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Deskripsi --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $portfolio->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Gambar --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar (Opsional)</label>
                            <p class="text-muted small">Kosongkan jika tidak ingin mengubah gambar.</p>
                            {{-- Tampilkan gambar saat ini --}}
                            <img src="{{ asset('images/portfolios/'.$portfolio->image) }}" class="img-thumbnail mb-2" style="width: 200px;">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol Aksi --}}
                        <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
