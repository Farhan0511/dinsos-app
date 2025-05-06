@extends('admin.main')

@section('input')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4 class="card-title mb-0">Form Input Berita Dinsos</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul">Judul Berita</label>
                                    <input type="text" class="form-control" id="judul"
                                        placeholder="Masukkan judul berita" />
                                </div>

                                <div class="form-group">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" class="form-control" id="penulis" placeholder="Nama penulis" />
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal Publikasi</label>
                                    <input type="date" class="form-control" id="tanggal" />
                                </div>

                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" id="kategori">
                                        <option>Pilih Kategori</option>
                                        <option>Bantuan Sosial</option>
                                        <option>Program Keluarga Harapan</option>
                                        <option>Layanan Disabilitas</option>
                                        <option>Berita Umum</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="gambar">Upload Gambar</label>
                                    <input type="file" class="form-control" id="gambar" />
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="isi">Isi Berita</label>
                                    <textarea class="form-control" id="isi" rows="10" placeholder="Tulis isi berita di sini..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-primary px-4">Simpan Berita</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
