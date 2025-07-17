@extends('admin.main')

@section('title', 'Daftar Berita')
@section('content')
    <div class="container py-4">
        <h3 class="mb-4 fw-semibold text-center mt-5">Input Berita Dinsos</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="conteiner">
            <div class="card-body">
                <form id="formBerita" action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Tampilkan error validasi server --}}
                    @if ($errors->any())
                        <div style="color: red;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" id="judul" name="judul" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="penulis">Penulis</label>
                        <input type="text" id="penulis" name="penulis" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="kategori">Kategori</label>
                        <select id="kategori" name="kategori" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Bantuan Sosial">Bantuan Sosial</option>
                            <option value="Pendidikan">Pendidikan</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <!-- Tambahkan kategori lain sesuai kebutuhan -->
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="gambar">Gambar</label>
                        <input type="file" id="gambar" name="gambar" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="isi">Isi</label>
                        <textarea id="isi" name="isi" class="form-control" rows="4" required></textarea>
                    </div>
                    
                    <div class="form-group mt-4 text-end">
                        <button type="submit" class="btn btn-primary">+ Tambah Berita</button>
                    </div>

                </form>
            </div>

        </div>

    </div>
@endsection
