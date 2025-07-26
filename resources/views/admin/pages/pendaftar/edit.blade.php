@extends('admin.main')
@section('title', 'Edit Pendaftar')

@section('content')
    <div class="container ">
        <div class="card">
            <div class="card-header">
                <h4>Form Edit Pendaftar</h4>
            </div>
            <div class="card-body">
                <form id="formUser" action="{{ route('admin.pendaftar.update', $pendaftar->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                            value="{{ old('nama', $pendaftar->GetUser->nama) }}" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required disabled
                            value="{{ old('email', $pendaftar->GetUser->email) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                        <select id="jenisKelamin" name="jenisKelamin" class="form-control" disabled>
                            <option value="laki-laki" {{ $pendaftar->GetUser->jenisKelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="perempuan" {{ $pendaftar->GetUser->jenisKelamin == 'perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="jenisBantuan">Jenis Bantuan</label>
                        <select id="jenisBantuan" name="jenisBantuan" class="form-control" disabled>
                            <option value="Kursi Roda" {{ $pendaftar->GetUser->jenisBantuan == 'Kursi Roda' ? 'selected' : '' }}>Kursi
                                Roda</option>
                            <option value="Tangan Palsu" {{ $pendaftar->GetUser->jenisBantuan == 'Tangan Palsu' ? 'selected' : '' }}>
                                Tangan Palsu</option>
                            <option value="Kaki Palsu" {{ $pendaftar->GetUser->jenisBantuan == 'Kaki Palsu' ? 'selected' : '' }}>Kaki
                                Palsu</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" disabled>{{ old('alamat', $pendaftar->GetUser->alamat) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nomorTelepon">Nomor Telepon</label>
                        <input type="text" id="nomorTelepon" name="nomorTelepon" class="form-control" disabled
                            value="{{ old('nomorTelepon', $pendaftar->GetUser->nomorTelepon) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="jenisBantuan" class="fw-semibold text-dark">Jenis Bantuan</label>
                        <select id="jenisBantuan" name="jenisBantuan"
                            class="form-select border border-primary-subtle shadow-sm" required disabled>
                            <option value="" disabled selected>Pilih jenis bantuan
                            </option>
                            <option value="Kursi Roda" {{ $pendaftar->GetUser->jenisBantuan == 'Kursi Roda' ? 'selected' : '' }}>Kursi
                                Roda</option>
                            <option value="Tangan Palsu" {{ $pendaftar->GetUser->jenisBantuan == 'Tangan Palsu' ? 'selected' : '' }}>
                                Tangan Palsu</option>
                            <option value="Kaki Palsu" {{ $pendaftar->GetUser->jenisBantuan == 'Kaki Palsu' ? 'selected' : '' }}>Kaki
                                Palsu</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="fotoKtp">Foto KTP</label>
                        @if ($pendaftar->GetUser->fotoKtp)
                            <div class="mb-2">
                                <img src="{{ asset('uploads/users/ktp/' . $pendaftar->GetUser->fotoKtp) }}" alt="Gambar Ktp" width="200"
                                    class="rounded-3 shadow-sm">
                            </div>
                        @endif
                        {{-- <input type="file" id="fotoKtp" name="fotoKtp" class="form-control"> --}}
                    </div>

                    <div class="form-group mb-3">
                        <label for="fotoRumah">Foto Rumah</label>
                        @if ($pendaftar->GetUser->fotoRumah)
                            <div class="mb-2">
                                <img src="{{ asset('uploads/users/rumah/' . $pendaftar->GetUser->fotoRumah) }}" alt="Gambar Rumah" width="200"
                                    class="rounded-3 shadow-sm">
                            </div>
                        @endif
                        {{-- <input type="file" id="fotoRumah" name="fotoRumah" class="form-control"> --}}
                    </div>

                    <div class="form-group mb-3">
                        <label for="fotoDiri">Foto Diri</label>
                        @if ($pendaftar->GetUser->fotoDiri)
                            <div class="mb-2">
                                <img src="{{ asset('uploads/users/fotodiri/' . $pendaftar->GetUser->fotoDiri) }}" alt="Gambar Diri" width="200"
                                    class="rounded-3 shadow-sm">
                            </div>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="belum diterima" {{ $pendaftar->status == 'belum diterima' ? 'selected' : '' }}>Belum Diterima</option>
                            <option value="diterima" {{ $pendaftar->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        </select>
                    </div>

                    <button type="submit" id="btnSimpan" class="btn btn-primary mt-4">Edit</button>
                    <a href="{{ route('admin.pendaftar.index') }}">
                        <button type="button" class="btn btn-success mt-4">Kembali</button>
                    </a>
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
                window.location.href = "{{ route('admin.pendaftar.index') }}";
            });
        </script>
    @endif
@endsection
