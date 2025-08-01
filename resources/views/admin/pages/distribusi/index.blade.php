@extends('admin.main')

@section('title', 'Data Distribusi Bantuan')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Distribusi Bantuan</h3>
            </div>
            <div class="w-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Distribusi Bantuan</div>
                            <a href="{{ route('admin.distribusi.create') }}" class="btn btn-primary mb-3">+ Tambah
                                Distribusi</a>
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
                                            <th>Foto Penyerahan</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $distribusi)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $distribusi->GetUser->nama }}</td>
                                                <td>{{ $distribusi->GetUser->email }}</td>
                                                <td>{{ $distribusi->GetUser->alamat }}</td>
                                                <td>{{ ucwords($distribusi->GetUser->jenisKelamin) }}</td>
                                                <td>{{ $distribusi->GetUser->jenisBantuan }}</td>
                                                <td>{{ $distribusi->GetUser->nomorTelepon }}</td>
                                                <td>
                                                    @if ($distribusi->foto_penyerahan)
                                                        <img src="{{ asset('uploads/distribusi/images/' . $distribusi->foto_penyerahan) }}"
                                                            alt="Foto Penyerahan" width="80" class="zoomable-img"
                                                            data-img="{{ asset('uploads/distribusi/images/' . $distribusi->foto_penyerahan) }}">
                                                    @else
                                                        <span class="text-muted">Tidak Ada</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($distribusi->created_at)->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.distribusi.edit', $distribusi->id) }}"
                                                        class="btn btn-sm btn-primary" title="Edit Status">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('admin.distribusi.destroy', $distribusi->id) }}"
                                                        method="POST" class="d-inline"
                                                        id="delete-form-{{ $distribusi->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger btn-delete"
                                                            data-id="{{ $distribusi->id }}">
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
