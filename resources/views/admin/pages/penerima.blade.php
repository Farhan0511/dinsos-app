@extends('admin.main')

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
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No Telepon</th>
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
                                            <td>{{ $p->nomorTelepon }}</td>
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
@endsection
