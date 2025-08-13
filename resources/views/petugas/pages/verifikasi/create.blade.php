@extends('petugas.main')

@section('title', 'Verifikasi Bantuan')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 text-center">Verifikasi Bantuan</h4>
            </div>
            <div class="card-body">
               <form action="{{ route('petugas.verifikasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="id_user">Pendaftar</label>
                        <select id="id_user" name="id_user" class="form-control">
                            <option value="" disabled selected>-- Pilih Pendaftar --</option>
                            @foreach ($pendaftar as $p)
                                <option value="{{ $p->GetUser->id }}">{{ $p->GetUser->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="foto_rumah">Foto Verifikasi Rumah</label>
                        <input type="file" class="form-control" id="foto_rumah" name="foto_rumah" accept="image/*">
                    </div>

                    <div class="form-group mb-3">
                        <label for="foto_diri">Foto Verifikasi Penerima</label>
                        <input type="file" class="form-control" id="foto_diri" name="foto_diri" accept="image/*">
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('petugas.verifikasi.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
