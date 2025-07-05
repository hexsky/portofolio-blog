<x-app-layout>
    {{-- Header Halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Portofolio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- Tombol untuk menambah data baru --}}
                    <a href="{{ route('portfolios.create') }}" class="btn btn-primary mb-3">
                        <i class="bi bi-plus-lg"></i> Tambah Item Portofolio
                    </a>

                    {{-- Pesan Sukses --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Tabel untuk menampilkan data --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col" style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Looping data portfolio --}}
                                @forelse ($portfolios as $index => $portfolio)
                                    <tr>
                                        {{-- Nomor urut --}}
                                        <th scope="row">{{ $portfolios->firstItem() + $index }}</th>
                                        <td>
                                            <img src="{{ asset('images/portfolios/'.$portfolio->image) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $portfolio->title }}</td>
                                        <td>{{ $portfolio->category }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST">
                                                {{-- Tombol Edit --}}
                                                <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> EDIT
                                                </a>

                                                {{-- Tombol Hapus --}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash3-fill"></i> HAPUS
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    {{-- Pesan jika data kosong --}}
                                    <tr>
                                        <td colspan="5">
                                            <div class="alert alert-danger text-center">
                                                Data portofolio belum tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Pagination Links --}}
                    {{ $portfolios->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
