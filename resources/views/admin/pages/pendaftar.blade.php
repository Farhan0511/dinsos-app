@extends('admin.main')

@section('title', 'Data | Pendaftar')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Pendaftar</h3>
            </div>
            <div class="w-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Pendaftar</div>
                            <input type="text" placeholder="Search ..." class="form-control mt-3" />
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">Jenis Bantuan</th>
                                            <th scope="col">No Telepon</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                 <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->nama }}</td>
                                                <td>{{ $d->email }}</td>
                                                <td>{{ $d->alamat }}</td>
                                                <td>{{ $d->jenisKelamin }}</td>
                                                <td>{{ $d->jenisBantuan }}</td>
                                                <td>{{ $d->nomorTelepon }}</td>
                                                <td>
                                                    <a href="{{ route('editUser', $d->id) }}" class="btn btn-sm btn-primary"
                                                        title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    {{-- Tombol hapus --}}
                                                    <button class="btn btn-sm btn-danger btn-delete"
                                                        data-id="{{ $d->id }}" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>

                                                    {{-- Form hapus disembunyikan --}}
                                                    <form id="form-delete-{{ $d->id }}"
                                                        action="{{ route('hapusUser', $d->id) }}" method="POST"
                                                        style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
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

    {{-- Load SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Tangkap semua tombol hapus
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
                        // Submit form hapus yang tersembunyi
                        document.getElementById('form-delete-' + userId).submit();
                    }
                });
            });
        });
    </script>

    {{-- SweetAlert notifikasi sukses dari server --}}
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

    {{-- SweetAlert notifikasi error dari server --}}
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
@endsection
