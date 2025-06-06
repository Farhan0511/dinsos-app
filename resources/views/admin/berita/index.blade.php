@extends('admin.main')

@section('title', 'Daftar Berita')
@section('content')
    <div class="container py-4">
        <h3 class="mb-4 fw-semibold text-center mt-5">Daftar Berita Dinsos</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mb-3">+ Tambah Berita</a>

        <table class="table table-bordered p-3">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Gambar</th> {{-- Kolom gambar --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beritas as $berita)
                    <tr>

                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->penulis }}</td>
                        <td>{{ $berita->tanggal }}</td>
                        <td>{{ $berita->kategori }}</td>
                        <td>
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" width="100"
                                    class="rounded">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-primary btn-sm"
                                title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $beritas->links() }}
    </div>
@endsection
