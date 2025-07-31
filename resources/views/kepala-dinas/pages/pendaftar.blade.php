@extends('kepala-dinas.main')

@section('title', 'Monitoring | Pendaftar')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Monitoring Data Pendaftar</h3>
            </div>
            <div class="w-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Pendaftar</div>
                            {{-- <form method="GET" action="{{ route('admin.pendaftar.index') }}" class="d-flex">
                                <input type="text" name="search" placeholder="Search ..." class="form-control mt-3 me-2"
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-secondary mt-3">Cari</button>

                                <a href="{{ route('admin.pendaftar.index') }}"
                                    class="btn btn-outline-secondary mt-3 ms-2">Refresh</a>
                            </form> --}}
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
                                            <th>Foto KTP</th>
                                            <th>Foto Rumah</th>
                                            <th>Foto Diri</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->GetUser->nama }}</td>
                                                <td>{{ $d->GetUser->email }}</td>
                                                <td>{{ $d->GetUser->alamat }}</td>
                                                <td>{{ $d->GetUser->jenisKelamin }}</td>
                                                <td>{{ $d->GetUser->nomorTelepon }}</td>
                                                <td>
                                                    @if ($d->GetUser->fotoKtp)
                                                        <img src="{{ asset('uploads/users/ktp/' . $d->GetUser->fotoKtp) }}" alt="Foto KTP"
                                                            width="100" class="zoomable-img"
                                                            data-img="{{ asset('uploads/users/ktp/' . $d->GetUser->fotoKtp) }}">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($d->GetUser->fotoRumah)
                                                        <img src="{{ asset('uploads/users/rumah/' . $d->GetUser->fotoRumah) }}"
                                                            alt="Foto Rumah" width="100" class="zoomable-img"
                                                            data-img="{{ asset('uploads/users/rumah/' . $d->GetUser->fotoRumah) }}">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($d->GetUser->fotoDiri)
                                                        <img src="{{ asset('uploads/users/fotodiri/' . $d->GetUser->fotoDiri) }}"
                                                            alt="Foto Diri" width="100" class="zoomable-img"
                                                            data-img="{{ asset('uploads/users/fotodiri/' . $d->GetUser->fotoDiri) }}">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($p->created_at)->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    @if ($d->status == 'diterima')
                                                        <span class="text-success">
                                                            <i class="fas fa-check-circle"></i> Diterima
                                                        </span>
                                                    @elseif($d->status == 'belum diterima')
                                                        <span class="text-danger">
                                                            <i class="fas fa-times-circle"></i> Belum Diterima
                                                        </span>
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

    {{-- Load SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Script hapus data --}}
    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Data user ini akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('form-delete-' + userId).submit();
                    }
                });
            });
        });
    </script>

    {{-- SweetAlert Notifikasi Sukses --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    {{-- SweetAlert Notifikasi Error --}}
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

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
