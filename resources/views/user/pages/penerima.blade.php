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
                        <div class="card-header">
                            <div class="card-title">Data Distribusi Bantuan</div>
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
                                            <th>No Telepon</th>
                                            <th>Foto Penyerahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($distribusi as $distribusi)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $distribusi->GetUser->nama }}</td>
                                                <td>{{ $distribusi->GetUser->email }}</td>
                                                <td>{{ $distribusi->GetUser->alamat }}</td>
                                                <td>{{ $distribusi->GetUser->jenis_kelamin }}</td>
                                                <td>{{ $distribusi->GetUser->jenis_bantuan }}</td>
                                                <td>{{ $distribusi->GetUser->no_telepon }}</td>
                                                <td>
                                                    @if ($distribusi->foto_penyerahan)
                                                        <img src="{{ asset('uploads/distribusi/images/' . $distribusi->foto_penyerahan) }}" width="80"
                                                            alt="Foto Penyerahan">
                                                    @else
                                                        <span class="text-muted">Tidak Ada</span>
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