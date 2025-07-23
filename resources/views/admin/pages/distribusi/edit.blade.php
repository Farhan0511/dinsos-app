@extends('admin.main')

@section('title', 'Edit Data Distribusi')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center fw-bold">Edit Data Distribusi</div>
                <div class="card-body">
                    <form action="{{ route('admin.distribusi.update', $distribusi->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $distribusi->nama }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $distribusi->email }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control">{{ $distribusi->alamat }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="Laki-laki" {{ $distribusi->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ $distribusi->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenis_bantuan">Jenis Bantuan</label>
                            <input type="text" name="jenis_bantuan" class="form-control"
                                value="{{ $distribusi->jenis_bantuan }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="no_telepon">No Telepon</label>
                            <input type="text" name="no_telepon" class="form-control"
                                value="{{ $distribusi->no_telepon }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="foto_penyerahan">Foto Penyerahan</label><br>
                            @if ($distribusi->foto_penyerahan)
                                <img src="{{ asset('uploads/distribusi/images/' . $distribusi->foto_penyerahan) }}" alt="Foto"
                                    width="100" class="mb-2">
                            @endif
                            <input type="file" name="foto_penyerahan" class="form-control">
                        </div>

                        <div class="text-end">
                            <a href="{{ route('admin.distribusi.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

