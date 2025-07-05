<x-app-layout>
    {{-- Header Halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Item Portofolio Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Formulir --}}
                    {{-- enctype="multipart/form-data" penting untuk upload file --}}
                    <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf {{-- Token keamanan Laravel --}}

                        {{-- Input Judul --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                            {{-- Pesan Error untuk Judul --}}
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Input Kategori --}}
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category') }}" required>
                            {{-- Pesan Error untuk Kategori --}}
                            @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Input Deskripsi --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                            {{-- Pesan Error untuk Deskripsi --}}
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Input Gambar --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required>
                            {{-- Pesan Error untuk Gambar --}}
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Tombol Aksi --}}
                        <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
