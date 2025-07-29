@extends('user.main')

@section('content')

    <div class="container mt-4">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Distribusi Bantuan</h3>
            </div>
            <div class="w-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Jenis Bantuan</th>
                                            <th>Foto Penyerahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($distribusis as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $p->GetUser->nama }}</td>
                                                <td>{{ $p->GetUser->alamat }}</td>
                                                <td>{{ $p->GetUser->jenisBantuan }}</td>
                                                <td>
                                                    @if ($p->foto_penyerahan)
                                                        <img src="{{ asset('uploads/distribusi/images/' . $p->foto_penyerahan) }}" alt="Foto Penyerahan"
                                                            width="100">
                                                    @else
                                                        <span class="text-muted">Tidak Ada</span>
                                                    @endif
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