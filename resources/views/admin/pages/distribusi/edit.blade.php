@extends('admin.main')

@section('title', 'Form Distribusi Bantuan')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 text-center">Form Distribusi Bantuan</h4>
            </div>
            <div class="card-body">
               <form action="{{ route('admin.distribusi.update', $distribusi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="id_user">Penerima</label>
                        <select id="id_user" name="id_user" class="form-control">
                            <option value="" disabled selected>-- Pilih Penerima --</option>
                            @foreach ($penerima as $p)
                                <option value="{{ $p->GetUser->id }}" {{ $distribusi->id_user == $p->GetUser->id? 'selected' : '' }}>{{ $p->GetUser->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Foto Penerima --}}
                    <div class="form-group mb-3">
                        <label for="foto_penyerahan">Foto Penyerahan</label><br>
                        @if ($distribusi->foto_penyerahan)
                            <img src="{{ asset('uploads/distribusi/images/' . $distribusi->foto_penyerahan) }}" alt="Foto"
                                width="100" class="mb-2">
                        @endif
                        <input type="file" name="foto_penyerahan" class="form-control" accept="image/*">
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
