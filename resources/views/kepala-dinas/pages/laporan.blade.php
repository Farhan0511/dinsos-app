@extends('kepala-dinas.main')

@section('title', 'Kepala Dinas | Laporan')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Laporan</h3>
            </div>

            <!-- Laporan Data Pendaftar -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title">Laporan Data Pendaftar</h4>

                    <form method="GET" action="{{ route('kepala-dinas.laporan-pendaftar.data') }}" class="row g-3 mt-3 align-items-end">
                        {{-- Input Tanggal Mulai --}}
                        <div class="col-md-4">
                            <label for="start_date_pendaftar" class="form-label">Tanggal Mulai</label>
                            <input type="date" name="start_date_pendaftar" id="start_date_pendaftar"
                                class="form-control"
                                value="{{ request('start_date_pendaftar') }}">
                        </div>

                        {{-- Input Tanggal Akhir --}}
                        <div class="col-md-4">
                            <label for="end_date_pendaftar" class="form-label">Tanggal Akhir</label>
                            <input type="date" name="end_date_pendaftar" id="end_date_pendaftar"
                                class="form-control"
                                value="{{ request('end_date_pendaftar') }}">
                        </div>

                        {{-- Tombol Filter --}}
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                        </div>

                        {{-- Tombol Download PDF --}}
                        <div class="col-md-2">
                            <a href="{{ route('laporan.pendaftar.pdf', [
                                'start_date_pendaftar' => request('start_date_pendaftar'),
                                'end_date_pendaftar' => request('end_date_pendaftar'),
                            ]) }}" class="btn btn-danger w-100">
                                <i class="fas fa-file-pdf"></i> Download PDF
                            </a>
                        </div>
                    </form>
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
                                @forelse ($pendaftars as $i => $p)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $p->GetUser->nama }}</td>
                                        <td>{{ $p->GetUser->nik }}</td>
                                        <td>{{ $p->GetUser->alamat }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->updated_at)->translatedFormat('d F Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Laporan Data Penerima -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan Data Penerima</h4>

                    <form method="GET" action="{{ route('kepala-dinas.laporan-penerima.data') }}" class="row g-2 mt-3 align-items-center">
                        <div class="col-auto">
                            <input type="date" name="start_date_penerima" class="form-control"
                                value="{{ request('start_date_penerima') }}">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('laporan.penerima.pdf', ['start_date_penerima' => request('start_date_penerima')]) }}"
                                class="btn btn-danger mt-2">
                                <i class="fas fa-file-pdf"></i> Download PDF
                            </a>
                        </div>                        
                    </form>
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
                                    <th>Tanggal Terima</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penerimas as $i => $p)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $p->GetUser->nama }}</td>
                                        <td>{{ $p->GetUser->nik }}</td>
                                        <td>{{ $p->GetUser->alamat }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->updated_at)->translatedFormat('d F Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
