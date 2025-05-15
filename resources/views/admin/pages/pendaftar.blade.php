@extends('admin.main')

@section('title', 'Data | Pendaftar')

@section('content') {{-- <- Ganti 'pendaftar' menjadi 'content' --}}
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Pendaftar</h3>
            </div>
            <div class="w-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Pendaftar</div>
                            <input type="text" placeholder="Search ..." class="form-control mt-3" />
                        </div>
                        <div class="card-body">
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Jenis Bantuan</th>
                                        <th scope="col">No Telepon</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->id }}</td>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->email }}</td>
                                            <td>{{ $d->alamat }}</td>
                                            <td>{{ $d->jenisKelamin }}</td>
                                            <td>{{ $d->jenisBantuan }}</td>
                                            <td>{{ $d->nomorTelepon }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <button class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
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
@endsection
