@extends('admin.main')

@section('title', 'Daftar Berita')
@section('content')
    <div class="container py-4">
        <h3 class="mb-4 fw-semibold text-center mt-5">Daftar Berita Dinsos</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="conteiner">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
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
                                <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mb-3">+ Tambah Berita</a>

        </div>

        {{ $beritas->links() }}
    </div>
@endsection
