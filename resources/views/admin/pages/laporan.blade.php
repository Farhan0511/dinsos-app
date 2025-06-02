@extends('admin.main')

@section('title', 'Laporan')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Laporan</h3>
            </div>

            <!-- Search bar untuk laporan -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan Data Pendaftar</h4>
                    <input type="text" placeholder="Search ..." class="form-control mt-3" />
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Contoh data statis -->
                                <tr>
                                    <td>1</td>
                                    <td>Farhan</td>
                                    <td>1234567890</td>
                                    <td>Jl. Merdeka No. 10</td>
                                    <td>01-06-2025</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Siti</td>
                                    <td>0987654321</td>
                                    <td>Jl. Sudirman No. 5</td>
                                    <td>15-05-2025</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Budi</td>
                                    <td>1122334455</td>
                                    <td>Jl. Ahmad Yani No. 20</td>
                                    <td>20-05-2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Laporan Data Penerima -->
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="card-title">Laporan Data Penerima</h4>
                    <input type="text" placeholder="Search ..." class="form-control mt-3" />
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Contoh data statis -->
                                <tr>
                                    <td>1</td>
                                    <td>Farhan</td>
                                    <td>1234567890</td>
                                    <td>Jl. Merdeka No. 10</td>
                                    <td>
                                        <span class="text-success">
                                            <i class="fas fa-check-circle"></i> Diterima
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Ayu</td>
                                    <td>5678901234</td>
                                    <td>Jl. Asia Afrika No. 8</td>
                                    <td>
                                        <span class="text-success">
                                            <i class="fas fa-check-circle"></i> Diterima
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Rina</td>
                                    <td>9988776655</td>
                                    <td>Jl. Gatot Subroto No. 7</td>
                                    <td>
                                        <span class="text-success">
                                            <i class="fas fa-check-circle"></i> Diterima
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
