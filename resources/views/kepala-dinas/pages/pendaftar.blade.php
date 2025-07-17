@extends('kepala-dinas.main')

@section('title', 'Monitoring | Pendaftar')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Monitoring Data Pendaftar</h3>
            </div>
            <div class="w-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Pendaftar</div>
                            <form method="GET" action="{{ route('kepala-dinas.pendaftar') }}" class="d-flex">
                                <input type="text" name="search" placeholder="Search ..." class="form-control mt-3 me-2"
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-secondary mt-3">Cari</button>
                                <a href="{{ route('kepala-dinas.pendaftar') }}"
                                    class="btn btn-outline-secondary mt-3 ms-2">Refresh</a>
                            </form>
                        </div>
                        <div class="card-body p-0">
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
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->nama }}</td>
                                                <td>{{ $d->email }}</td>
                                                <td>{{ $d->alamat }}</td>
                                                <td>{{ $d->jenisKelamin }}</td>
                                                <td>{{ $d->jenisBantuan }}</td>
                                                <td>{{ $d->nomorTelepon }}</td>
                                                <td>
                                                    @if ($d->fotoKtp)
                                                        <img src="{{ asset('views/image/' . $d->fotoKtp) }}" alt="Foto KTP" width="100">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($d->fotoRumah)
                                                        <img src="{{ asset('views/image/' . $d->fotoRumah) }}" alt="Foto Rumah" width="100">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($d->status == 'diterima')
                                                        <span class="text-success">
                                                            <i class="fas fa-check-circle"></i> Diterima
                                                        </span>
                                                    @else
                                                        <span class="text-danger">
                                                            <i class="fas fa-times-circle"></i> Belum Diterima
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- /.table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
