@extends('admin.main')

@section('title', 'Data Verifikasi Bantuan')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Verifikasi Bantuan</h3>
            </div>
            <div class="w-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Verifikasi Bantuan</div>
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
                                            <th>Jenis Bantuan</th>
                                            <th>No Telepon</th>
                                            <th>Foto Rumah</th>
                                            <th>Foto Penerima</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $verifikasi)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $verifikasi->GetUser->nama }}</td>
                                                <td>{{ $verifikasi->GetUser->email }}</td>
                                                <td>{{ $verifikasi->GetUser->alamat }}</td>
                                                <td>{{ ucwords($verifikasi->GetUser->jenisKelamin) }}</td>
                                                <td>{{ $verifikasi->GetUser->jenisBantuan }}</td>
                                                <td>{{ $verifikasi->GetUser->nomorTelepon }}</td>
                                                <td>
                                                    @if ($verifikasi->foto_rumah)
                                                        <img src="{{ asset('uploads/verifikasi/images/' . $verifikasi->foto_rumah) }}"
                                                            alt="Foto Rumah" width="80" class="zoomable-img"
                                                            data-img="{{ asset('uploads/verifikasi/images/' . $verifikasi->foto_rumah) }}">
                                                    @else
                                                        <span class="text-muted">Tidak Ada</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($verifikasi->foto_diri)
                                                        <img src="{{ asset('uploads/verifikasi/images/' . $verifikasi->foto_diri) }}"
                                                            alt="Foto Diri" width="80" class="zoomable-img"
                                                            data-img="{{ asset('uploads/verifikasi/images/' . $verifikasi->foto_diri) }}">
                                                    @else
                                                        <span class="text-muted">Tidak Ada</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($verifikasi->status == 'diterima')                                                        
                                                        <span class="text-success">
                                                            <i class="fas fa-check-circle"></i> Diterima
                                                        </span>
                                                    @elseif ($verifikasi->status == 'belum diterima')                                                        
                                                        <span class="text-danger">
                                                            <i class="fas fa-xmark-circle"></i> Belum Diterima
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.verifikasi.edit', $verifikasi->id) }}"
                                                        class="btn btn-sm btn-primary" title="Edit Status">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.btn-terima').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                Swal.fire({
                    title: 'Yakin ingin menerima?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Terima!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`updateterima-form-${id}`).submit();
                    }
                });
            });
        });

        document.querySelectorAll('.btn-tolak').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                Swal.fire({
                    title: 'Yakin ingin menolak?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Tolak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`updatetolak-form-${id}`).submit();
                    }
                });
            });
        });

        // Zoom Gambar
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('zoomable-img')) {
                const imageUrl = e.target.getAttribute('data-img');
                Swal.fire({
                    imageUrl: imageUrl,
                    imageAlt: 'Foto Penyerahan',
                    showConfirmButton: false,
                    showCloseButton: true,
                    width: 'auto',
                    padding: '1em',
                    background: '#fff',
                });
            }
        });
    </script>
@endsection
