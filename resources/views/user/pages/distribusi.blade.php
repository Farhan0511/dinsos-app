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
                                                        <img src="{{ asset('uploads/distribusi/images/' . $p->foto_penyerahan) }}"
                                                            alt="Foto Penyerahan" width="100" style="cursor: pointer;"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#zoomModal{{ $p->id }}">
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="zoomModal{{ $p->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="zoomModalLabel{{ $p->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="zoomModalLabel{{ $p->id }}">Foto
                                                                            Penyerahan</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <img src="{{ asset('uploads/distribusi/images/' . $p->foto_penyerahan) }}"
                                                                            alt="Zoom Foto Penyerahan"
                                                                            class="img-fluid rounded">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
