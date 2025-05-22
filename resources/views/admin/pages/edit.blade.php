@extends('admin.main')
@section('title', 'Edit User')

@section('content')
    <div class="container ">
        <div class="card">
            <div class="card-header">
                <h4>Form Edit User</h4>
            </div>
            <div class="card-body">
                <form id="formUser" action="{{ route('admin.editUserPost', $data->id) }}" method="POST">
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
                            value="{{ old('nama', $data->nama) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required
                            value="{{ old('email', $data->email) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                        <select id="jenisKelamin" name="jenisKelamin" class="form-control">
                            <option value="laki-laki" {{ $data->jenisKelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="perempuan"
                                {{ strtolower($data->jenisKelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="jenisBantuan">Jenis Bantuan</label>
                        <select id="jenisBantuan" name="jenisBantuan" class="form-control">
                            <option value="Kursi Roda" {{ $data->jenisBantuan == 'Kursi Roda' ? 'selected' : '' }}>Kursi
                                Roda</option>
                            <option value="Tangan Palsu" {{ $data->jenisBantuan == 'Tangan Palsu' ? 'selected' : '' }}>
                                Tangan Palsu</option>
                            <option value="Kaki Palsu" {{ $data->jenisBantuan == 'Kaki Palsu' ? 'selected' : '' }}>Kaki
                                Palsu</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" required>{{ old('alamat', $data->alamat) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nomorTelepon">Nomor Telepon</label>
                        <input type="text" id="nomorTelepon" name="nomorTelepon" class="form-control" required
                            value="{{ old('nomorTelepon', $data->nomorTelepon) }}">
                    </div>

                    {{-- Tombol bertipe button agar submit dikontrol manual --}}
                    <button type="button" id="btnSimpan" class="btn btn-primary mt-4">Edit</button>
                    <a href="{{ route('pendaftar') }}"><button type="button" id="btnSimpan" class="btn btn-success mt-4">Kembali</button></a>
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

            if (!nama) {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Nama tidak boleh kosong.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }
            if (!email) {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Email tidak boleh kosong.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }
            if (!alamat) {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Alamat tidak boleh kosong.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Submit form jika lolos validasi
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
                window.location.href = "{{ route('pendaftar') }}"; // arahkan ke halaman utama
            });
        </script>
    @endif
@endsection
