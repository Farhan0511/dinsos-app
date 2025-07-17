@extends('user.main')
@section('title', 'Form Daftar')

@section('content')
    <div class="container mt-5">
        <div class="">
            <div class="card-header">
                <h4>Form Daftar</h4>
            </div>
            <div class="card-body">
                <form id="formUser" action="{{ route('user.daftarUser') }}" method="POST" enctype="multipart/form-data">

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
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" required
                            value="{{ old('nama') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required
                            value="{{ old('email') }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="jenisKelamin" class="fw-semibold text-dark">Jenis Kelamin</label>
                        <select id="jenisKelamin" name="jenisKelamin"
                            class="form-select border border-primary-subtle shadow-sm" required>
                            <option value="" disabled {{ old('jenisKelamin') ? '' : 'selected' }}>Pilih jenis kelamin
                            </option>
                            <option value="laki-laki" {{ old('jenisKelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="perempuan" {{ old('jenisKelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="jenisBantuan" class="fw-semibold text-dark">Jenis Bantuan</label>
                        <select id="jenisBantuan" name="jenisBantuan"
                            class="form-select border border-primary-subtle shadow-sm" required>
                            <option value="" disabled {{ old('jenisBantuan') ? '' : 'selected' }}>Pilih jenis bantuan
                            </option>
                            <option value="Kursi Roda" {{ old('jenisBantuan') == 'Kursi Roda' ? 'selected' : '' }}>Kursi
                                Roda</option>
                            <option value="Tangan Palsu" {{ old('jenisBantuan') == 'Tangan Palsu' ? 'selected' : '' }}>
                                Tangan Palsu</option>
                            <option value="Kaki Palsu" {{ old('jenisBantuan') == 'Kaki Palsu' ? 'selected' : '' }}>Kaki
                                Palsu</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomorTelepon">Nomor Telepon</label>
                        <input type="text" id="nomorTelepon" name="nomorTelepon" class="form-control"
                            value="{{ old('nomorTelepon') }}" placeholder="081234567890">
                    </div>

                    <div class="form-group mb-3">
                        <label for="fotoKtp">Upload Foto KTP (jpg, jpeg, png)</label>
                        <input type="file" id="fotoKtp" name="fotoKtp" class="form-control bg-white text-dark"
                            accept=".jpg,.jpeg,.png">
                    </div>


                    <div class="mt-4 d-flex gap-2">
                        <button type="button" id="btnSimpan" class="btn btn-outline-primary fw-semibold shadow-sm px-4">
                            <i class="fas fa-plus me-1"></i> Tambah
                        </button>

                        <a href="{{ route('home') }}" class="text-decoration-none">
                            <button type="button" class="btn btn-outline-success fw-semibold shadow-sm px-4">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </button>
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- Load SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('btnSimpan').addEventListener('click', function() {
            const nama = document.getElementById('nama').value.trim();
            const email = document.getElementById('email').value.trim();
            const alamat = document.getElementById('alamat').value.trim();
            const nomor = document.getElementById('nomorTelepon').value.trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const nomorPattern = /^[0-9]{10,15}$/;

            if (!nama) {
                Swal.fire('Gagal!', 'Nama tidak boleh kosong.', 'error');
                return;
            }
            if (!email) {
                Swal.fire('Gagal!', 'Email tidak boleh kosong.', 'error');
                return;
            }
            if (!emailPattern.test(email)) {
                Swal.fire('Gagal!', 'Format email tidak valid.', 'error');
                return;
            }
            if (!alamat) {
                Swal.fire('Gagal!', 'Alamat tidak boleh kosong.', 'error');
                return;
            }
            if (nomor && !nomorPattern.test(nomor)) {
                Swal.fire('Gagal!', 'Nomor telepon harus 10–15 digit angka.', 'error');
                return;
            }

            document.getElementById('formUser').submit();
        });
    </script>

    {{-- SweetAlert notifikasi sukses dari server --}}
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                timer: 2500,
                showConfirmButton: false,
                timerProgressBar: true
            }).then(() => {
                window.location.href = "{{ route('home') }}";
            });
        </script>
    @endif
@endsection
