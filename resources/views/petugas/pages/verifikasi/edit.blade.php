@extends('petugas.main')

@section('title', 'Verifikasi Bantuan')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 text-center">Verifikasi Bantuan</h4>
            </div>
            <div class="card-body">
               <form action="{{ route('petugas.verifikasi.update', $verifikasi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="id_user">Pendaftar</label>
                        <select id="id_user" name="id_user" class="form-control">
                            <option value="" disabled selected>-- Pilih Pendaftar --</option>
                            @foreach ($pendaftar as $p)
                                <option value="{{ $p->GetUser->id }}" {{ $verifikasi->id_user == $p->GetUser->id? 'selected' : '' }}>{{ $p->GetUser->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="foto_rumah">Foto Verifikasi Rumah</label><br>
                        @if ($verifikasi->foto_rumah)
                            <img src="{{ asset('uploads/verifikasi/images/' . $verifikasi->foto_rumah) }}" alt="Foto"
                                width="100" class="mb-2">
                        @endif
                        <input type="file" name="foto_rumah" class="form-control" accept="image/*">
                    </div>

                    <div class="form-group mb-3">
                        <label for="foto_rumah">Foto Verifikasi Penerima</label><br>
                        @if ($verifikasi->foto_diri)
                            <img src="{{ asset('uploads/verifikasi/images/' . $verifikasi->foto_diri) }}" alt="Foto"
                                width="100" class="mb-2">
                        @endif
                        <input type="file" name="foto_diri" class="form-control" accept="image/*">
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
