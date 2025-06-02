@extends('admin.main')

@section('title', 'Input Berita')
@section('content')
    <div class="w-100 vh-100 d-flex justify-content-center align-items-start py-5 bg-light mt-5">
        <div class="card shadow rounded-4 border-0" style="width: 90vw; max-width: 1200px;">
            <div class="card-header bg-light text-white text-center py-4 rounded-top-4">
                <h4 class="card-title mb-0 fw-semibold">Form Input Berita Dinsos</h4>
            </div>

            <div class="card-body p-4">
                <form id="formBerita" action="{{ route('admin.storeBerita') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())

                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        
                    @endif
                    <div class="mb-4">
                        <label for="judul" class="form-label fw-semibold">Judul Berita</label>
                        <input type="text" class="form-control form-control-lg" id="judul" name="judul"
                            placeholder="Masukkan judul berita" />
                    </div>

                    <div class="mb-4 row g-3">
                        <div class="col-md-6">
                            <label for="penulis" class="form-label fw-semibold">Penulis</label>
                            <input type="text" class="form-control form-control-lg" id="penulis" name="penulis"
                                placeholder="Nama penulis" />
                        </div>

                        <div class="col-md-6">
                            <label for="tanggal" class="form-label fw-semibold">Tanggal Publikasi</label>
                            <input type="date" class="form-control form-control-lg" id="tanggal" name="tanggal" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="kategori" class="form-label fw-semibold">Kategori</label>
                        <select class="form-select form-select-lg" id="kategori" name="kategori">
                            <option selected disabled>Pilih Kategori</option>
                            <option>Bantuan Sosial</option>
                            <option>Program Keluarga Harapan</option>
                            <option>Layanan Disabilitas</option>
                            <option>Berita Umum</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label fw-semibold">Upload Gambar</label>
                        <input class="form-control form-control-lg" type="file" id="gambar" name="gambar"
                            accept="image/*" />
                    </div>

                    <div class="mb-4">
                        <label for="isi" class="form-label fw-semibold">Isi Berita</label>
                        <textarea class="form-control form-control-lg" id="isi" name="isi" rows="10"
                            placeholder="Tulis isi berita di sini..."></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg px-5 fw-semibold">Simpan Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .card {
            background: #fff;
            box-shadow: 0 10px 30px rgb(0 0 0 / 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 15px 40px rgb(0 0 0 / 0.15);
        }

        label.form-label {
            font-weight: 600;
        }

        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #f8f9fa;
        }
    </style>
@endsection
