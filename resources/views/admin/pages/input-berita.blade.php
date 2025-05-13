@extends('admin.main')

@section('title', 'Input-berita')
@section('input')
    <div class="container my-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10 col-lg-8 mt-3">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4 class="card-title mb-0">Form Input Berita Dinsos</h4>
                    </div>

                    <div class="container-fluid px-3">
                        <div class="card-body w-100">
                            <div class="w-100">
                                <!-- Formulir Judul -->
                                <div class="form-group w-100">
                                    <label for="judul">Judul Berita</label>
                                    <input type="text" class="form-control" id="judul"
                                        placeholder="Masukkan judul berita" />
                                </div>

                                <!-- Formulir Penulis -->
                                <div class="form-group w-100">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" class="form-control" id="penulis" placeholder="Nama penulis" />
                                </div>

                                <!-- Formulir Tanggal Publikasi -->
                                <div class="form-group w-100">
                                    <label for="tanggal">Tanggal Publikasi</label>
                                    <input type="date" class="form-control" id="tanggal" />
                                </div>

                                <!-- Formulir Kategori -->
                                <div class="form-group w-100">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" id="kategori">
                                        <option>Pilih Kategori</option>
                                        <option>Bantuan Sosial</option>
                                        <option>Program Keluarga Harapan</option>
                                        <option>Layanan Disabilitas</option>
                                        <option>Berita Umum</option>
                                    </select>
                                </div>

                                <!-- Formulir Upload Gambar -->
                                <div class="form-group w-100">
                                    <label for="gambar">Upload Gambar</label>
                                    <input type="file" class="form-control" id="gambar" />
                                </div>

                                <!-- Formulir Isi Berita -->
                                <div class="form-group w-100">
                                    <label for="isi">Isi Berita</label>
                                    <textarea class="form-control" id="isi" rows="10" placeholder="Tulis isi berita di sini..."></textarea>
                                </div>

                                <!-- Tombol Simpan -->
                                <div class="text-center mt-4">
                                    <button class="btn btn-primary px-4" id="btnSimpan">Simpan Berita</button>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('btnSimpan').addEventListener('click', function() {
            const judul = document.getElementById('judul').value;

            if (judul.trim() === "") {
                Swal.fire({
                    title: "Gagal!",
                    text: "Judul berita tidak boleh kosong.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            } else {
                // Simulasi berhasil
                Swal.fire({
                    title: "Berhasil!",
                    text: "Berita berhasil disimpan.",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            }
        });
    </script>

@endsection
