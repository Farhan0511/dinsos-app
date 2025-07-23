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

                    <div class="form-group mb-3">
                        <label for="id_user">Penerima</label>
                        <select id="id_user" name="id_user" class="form-control">
                            <option value="" disabled selected>-- Pilih Penerima --</option>
                            @foreach ($penerima as $p)
                                <option value="{{ $p->GetUser->id }}">{{ $p->GetUser->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Foto Penerima --}}
                    <div class="form-group mb-3">
                        <label for="foto_penyerahan">Foto Penyerahan Bantuan</label>
                        <input type="file" class="form-control" id="foto_penyerahan" name="foto_penyerahan" accept="image/*">
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
