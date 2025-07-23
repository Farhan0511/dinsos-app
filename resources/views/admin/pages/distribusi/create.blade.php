@extends('admin.main')

@section('title', 'Form Distribusi Bantuan')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 text-center">Form Distribusi Bantuan</h4>
            </div>
            <div class="card-body">
               <form action="{{ route('admin.distribusi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- nama --}}
                    <div class="form-group mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Masukkan Nama">
                    </div>

                    {{-- Email --}}
                    <div class="form-group mb-3">
                        <label for="email2">Email Address</label>
                        <input type="email" class="form-control" id="email2" name="email"
                            placeholder="Masukkan Email">
                    </div>

                    {{-- Alamat --}}
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="form-group mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>

                    {{-- Jenis Bantuan --}}
                    <div class="form-group mb-3">
                        <label for="jenisBantuan">Jenis Bantuan</label>
                      <select id="jenis_bantuan" name="jenis_bantuan" class="form-control">
                            <option value="">-- Pilih Jenis Bantuan --</option>
                            <option value="Kursi Roda">Kursi
                                Roda</option>
                            <option value="Tangan Palsu">
                                Tangan Palsu</option>
                            <option value="Kaki Palsu">Kaki
                                Palsu</option>
                        </select>
                    </div>

                    {{-- Foto Penerima --}}
                    <div class="form-group mb-3">
                        <label for="foto_penerima">Foto Penerima Bantuan</label>
                        <input type="file" class="form-control" id="foto_penerima" name="foto_penerima" accept="image/*">
                    </div>

                    {{-- Foto Rumah --}}
                    <div class="form-group mb-3">
                        <label for="foto_rumah">Foto Keadaan Rumah</label>
                        <input type="file" class="form-control" id="foto_rumah" name="foto_rumah" accept="image/*">
                    </div>

                    {{-- Nomor Telepon --}}
                    <div class="form-group mb-4">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp"
                            placeholder="Contoh: 08123456789">
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.distribusi.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
