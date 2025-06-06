@extends('admin.main')

@section('title', 'Edit Berita')
@section('content')
    <div class="w-100 vh-100 d-flex justify-content-center align-items-start py-5 bg-light mt-5">
        <div class="card shadow rounded-4 border-0" style="width: 90vw; max-width: 1200px;">
            <div class="card-header bg-light text-white text-center py-4 rounded-top-4">
                <h4 class="card-title mb-0 fw-semibold">Form Edit Berita Dinsos</h4>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                            value="{{ old('judul', $berita->judul) }}" placeholder="Masukkan judul berita" />
                    </div>

                    <div class="mb-4 row g-3">
                        <div class="col-md-6">
                            <label for="penulis" class="form-label fw-semibold">Penulis</label>
                            <input type="text" class="form-control form-control-lg" id="penulis" name="penulis"
                                value="{{ old('penulis', $berita->penulis) }}" placeholder="Nama penulis" />
                        </div>

                        <div class="col-md-6">
                            <label for="tanggal" class="form-label fw-semibold">Tanggal Publikasi</label>
                            <input type="date" class="form-control form-control-lg" id="tanggal" name="tanggal"
                                value="{{ old('tanggal', $berita->tanggal) }}" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="kategori" class="form-label fw-semibold">Kategori</label>
                        <select class="form-select form-select-lg" id="kategori" name="kategori">
                            <option disabled>Pilih Kategori</option>
                            @php
                                $kategoriOptions = [
                                    'Bantuan Sosial',
                                    'Program Keluarga Harapan',
                                    'Layanan Disabilitas',
                                    'Berita Umum',
                                ];
                            @endphp
                            @foreach ($kategoriOptions as $kategori)
                                <option value="{{ $kategori }}"
                                    {{ old('kategori', $berita->kategori) == $kategori ? 'selected' : '' }}>
                                    {{ $kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label fw-semibold">Upload Gambar</label>
                        @if ($berita->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" width="200"
                                    class="rounded-3 shadow-sm">
                            </div>
                        @endif
                        <input class="form-control form-control-lg" type="file" id="gambar" name="gambar"
                            accept="image/*" />
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    </div>

                    <div class="mb-4">
                        <label for="isi" class="form-label fw-semibold">Isi Berita</label>
                        <textarea class="form-control form-control-lg" id="isi" name="isi" rows="10"
                            placeholder="Tulis isi berita di sini...">{{ old('isi', $berita->isi) }}</textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg px-5 fw-semibold">Update Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
