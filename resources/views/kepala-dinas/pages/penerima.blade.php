@extends('kepala-dinas.main')

@section('title', 'Monitoring | Penerima')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Monitoring Data Penerima</h3>
            </div>
            <div class="w-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Penerima</div>
                        </div>
                        <div class="card-body">
                            {{-- <input type="text" placeholder="Search ..." class="form-control mb-3" /> --}}
                            <div class="table-responsive">

                                <table class="table table-striped table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jenis Bantuan</th>
                                            <th>No Telepon</th>
                                            <th>Foto KTP</th>
                                            <th>Foto Rumah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penerima as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $p->GetUser->nama }}</td>
                                                <td>{{ $p->GetUser->email }}</td>
                                                <td>{{ $p->GetUser->alamat }}</td>
                                                <td>{{ $p->GetUser->jenisKelamin }}</td>
                                                <td>{{ $p->GetUser->jenisBantuan }}</td>
                                                <td>{{ $p->GetUser->nomorTelepon }}</td>
                                                <td>
                                                    @if ($p->GetUser->fotoKtp)
                                                        <img src="{{ asset('uploads/users/ktp/' . $p->GetUser->fotoKtp) }}" alt="Foto KTP"
                                                            width="100">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($p->GetUser->fotoRumah)
                                                        <img src="{{ asset('uploads/users/rumah/' . $p->GetUser->fotoRumah) }}" alt="Foto Rumah"
                                                            width="100">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="text-success">
                                                        <i class="fas fa-check-circle"></i> Diterima
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
