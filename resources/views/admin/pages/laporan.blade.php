@extends('admin.main')

@section('title', 'Laporan')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Laporan</h3>
            </div>

            <!-- Laporan Data Pendaftar dengan filter periode -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title">Laporan Data Pendaftar</h4>

                    <form id="filter-pendaftar-form" class="row g-2 mt-3">
                        <div class="col-auto">
                            <input type="date" name="start_date" id="start_date_pendaftar" class="form-control" />
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0" id="table-pendaftar">
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
                                <tr>
                                    <td>1</td>
                                    <td>Farhan</td>
                                    <td>1234567890</td>
                                    <td>Jl. Merdeka No. 10</td>
                                    <td>2025-06-01</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Siti</td>
                                    <td>0987654321</td>
                                    <td>Jl. Sudirman No. 5</td>
                                    <td>2025-05-15</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Budi</td>
                                    <td>1122334455</td>
                                    <td>Jl. Ahmad Yani No. 20</td>
                                    <td>2025-05-20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Laporan Data Penerima dengan filter periode -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan Data Penerima</h4>

                    <form id="filter-penerima-form" class="row g-2 mt-3">
                        <div class="col-auto">
                            <input type="date" name="start_date" id="start_date_penerima" class="form-control" />
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0" id="table-penerima">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Terima</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Aisyah</td>
                                    <td>2233445566</td>
                                    <td>Jl. Melati No. 7</td>
                                    <td>2025-06-02</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Rudi</td>
                                    <td>6677889900</td>
                                    <td>Jl. Sudirman No. 9</td>
                                    <td>2025-05-18</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Lina</td>
                                    <td>5544332211</td>
                                    <td>Jl. Gatot Subroto No. 15</td>
                                    <td>2025-05-22</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>
        document.getElementById('filter-pendaftar-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const startDate = document.getElementById('start_date_pendaftar').value;
            const endDate = document.getElementById('end_date_pendaftar').value;

            const table = document.getElementById('table-pendaftar').getElementsByTagName('tbody')[0];
            const rows = table.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const tanggal = rows[i].cells[4].innerText; // tanggal di kolom 5 (index 4)
                if (startDate && tanggal < startDate) {
                    rows[i].style.display = 'none';
                    continue;
                }
                if (endDate && tanggal > endDate) {
                    rows[i].style.display = 'none';
                    continue;
                }
                rows[i].style.display = '';
            }
        });
    </script>
@endsection
