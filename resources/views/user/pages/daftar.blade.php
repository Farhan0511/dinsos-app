@extends('user.main')
@section('title', 'Tambah User')

@section('content')
    <div class="container mt-5" style="max-width: 480px;">
        <h2 class="mb-4 text-center fw-bold">Form Daftar</h2>

        {{-- Tampilkan error validasi server --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="formUser" action="{{ route('daftarUser') }}" method="POST" novalidate>
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label fw-semibold">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" id="email" name="email" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label for="jenisKelamin" class="form-label fw-semibold">Jenis Kelamin</label>
                <select id="jenisKelamin" name="jenisKelamin" class="form-select form-select-lg" required>
                    <option value="" disabled selected>Pilih jenis kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="jenisBantuan" class="form-label fw-semibold">Jenis Bantuan</label>
                <select id="jenisBantuan" name="jenisBantuan" class="form-select form-select-lg" required>
                    <option value="" disabled selected>Pilih jenis bantuan</option>
                    <option value="Kursi Roda">Kursi Roda</option>
                    <option value="Tangan Palsu">Tangan Palsu</option>
                    <option value="Kaki Palsu">Kaki Palsu</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label fw-semibold">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-control form-control-lg" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="nomorTelepon" class="form-label fw-semibold">Nomor Telepon</label>
                <input type="text" id="nomorTelepon" name="nomorTelepon" class="form-control form-control-lg"
                    placeholder="081234567890">
            </div>

            <button type="button" id="btnSimpan" class="btn btn-primary btn-lg w-100 fw-semibold mt-3">Tambah</button>
        </form>
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
                Swal.fire('Gagal!', 'Nomor telepon harus berupa angka (10-15 digit).', 'error');
                return;
            }

            // Disable tombol dan submit form
            const btn = document.getElementById('btnSimpan');
            btn.disabled = true;
            btn.innerText = 'Menyimpan...';

            document.getElementById('formUser').submit();
        });
    </script>

    {{-- SweetAlert notifikasi sukses dari server --}}
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                timer: 2500,
                showConfirmButton: false,
                timerProgressBar: true
            }).then(() => {
                window.location.href = "{{ route('home') }}"; // arahkan ke halaman utama
            });
        </script>
    @endif
@endsection
