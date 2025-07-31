@extends('kepala-dinas.main')

@section('title', 'Monitoring | Penerima')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Monitoring Data Penerima</h3>
            </div>
            <div class="w-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Penerima</div>
                        </div>
                        <div class="card-body">
                            {{-- <input type="text" placeholder="Search ..." class="form-control mb-3" /> --}}
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
                                            <th>Foto Diri</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penerima as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $p->GetUser->nama }}</td>
                                                <td>{{ $p->GetUser->email }}</td>
                                                <td>{{ $p->GetUser->alamat }}</td>
                                                <td>{{ $p->GetUser->jenisKelamin }}</td>
                                                <td>{{ $p->GetUser->jenisBantuan }}</td>
                                                <td>{{ $p->GetUser->nomorTelepon }}</td>
                                                <td>
                                                    @if ($p->GetUser->fotoKtp)
                                                        <img src="{{ asset('uploads/users/ktp/' . $p->GetUser->fotoKtp) }}"
                                                            data-img="{{ asset('uploads/users/ktp/' . $p->GetUser->fotoKtp) }}"  alt="Foto KTP" width="100">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($p->GetUser->fotoRumah)
                                                        <img src="{{ asset('uploads/users/rumah/' . $p->GetUser->fotoRumah) }}" alt="Foto Rumah"
                                                            data-img="{{ asset('uploads/users/rumah/' . $p->GetUser->fotoRumah) }}" width="100">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($p->GetUser->fotoDiri)
                                                        <img src="{{ asset('uploads/users/fotodiri/' . $p->GetUser->fotoDiri) }}" alt="Foto Diri"
                                                            data-img="{{ asset('uploads/users/fotodiri/' . $p->GetUser->fotoDiri) }}" width="100">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($p->created_at)->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    <span class="text-success">
                                                        <i class="fas fa-check-circle"></i> Diterima
                                                    </span>
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
    {{-- Load SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Zoom Gambar dengan SweetAlert2 --}}
    <script>
        document.querySelectorAll('.zoomable-img').forEach(img => {
            img.addEventListener('click', function() {
                const imageUrl = this.getAttribute('data-img');

                Swal.fire({
                    imageUrl: imageUrl,
                    imageAlt: 'Foto Pendaftar',
                    showConfirmButton: false,
                    showCloseButton: true,
                    width: 'auto',
                    padding: '1em',
                    background: '#fff',
                });
            });
        });
    </script>
@endsection
