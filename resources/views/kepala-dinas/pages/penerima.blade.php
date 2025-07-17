@extends('kepala-dinas.main')

@section('title', 'Data | Penerima')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Penerima</h3>
            </div>
            <div class="w-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Penerima</div>
                        </div>
                        <div class="card-body">
                            <input type="text" placeholder="Search ..." class="form-control mb-3" />
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
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->email }}</td>
                                            <td>{{ $p->alamat }}</td>
                                            <td>{{ $p->jenisKelamin }}</td>
                                            <td>{{ $p->jenisBantuan }}</td>
                                            <td>{{ $p->nomorTelepon }}</td>
                                            <td>
                                                @if ($p->fotoKtp)
                                                    <img src="{{ asset('views/image/' . $p->fotoKtp) }}" alt="Foto KTP" width="100">
                                                @else
                                                    <span class="text-muted">Belum Upload</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($p->fotoRumah)
                                                    <img src="{{ asset('views/image/' . $p->fotoRumah) }}" alt="Foto Rumah" width="100">
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
                        </div> <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
