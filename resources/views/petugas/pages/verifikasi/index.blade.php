@extends('petugas.main')

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
                            <a href="{{ route('petugas.verifikasi.create') }}" class="btn btn-primary mb-3">+ Tambah
                                Verifikasi</a>
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
                                                    <a href="{{ route('petugas.verifikasi.edit', $verifikasi->id) }}"
                                                        class="btn btn-sm btn-primary" title="Edit Status">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('petugas.verifikasi.destroy', $verifikasi->id) }}"
                                                        method="POST" class="d-inline"
                                                        id="delete-form-{{ $verifikasi->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger btn-delete"
                                                            data-id="{{ $verifikasi->id }}">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
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
        // Hapus Data SweetAlert
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                Swal.fire({
                    title: 'Yakin ingin menghapus data ini?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${id}`).submit();
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
