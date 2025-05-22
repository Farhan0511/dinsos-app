@extends('admin.main')

@section('title', 'Data | Penerima')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Penerima</h3>
            </div>
            <div class=" w-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Penerima</div>
                        </div>
                        <div class="card-body">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control" />
                            </div>
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">No Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>mark@example.com</td>
                                        <td>Jl. Merdeka No.1</td>
                                        <td>Laki-laki</td>
                                        <td>081234567890</td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>jacob@example.com</td>
                                        <td>Jl. Sudirman No.2</td>
                                        <td>Perempuan</td>
                                        <td>081298765432</td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry the Bird</td>
                                        <td>larry@example.com</td>
                                        <td>Jl. Pahlawan No.3</td>
                                        <td>Laki-laki</td>
                                        <td>081200011122</td>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
