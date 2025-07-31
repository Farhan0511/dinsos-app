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
                            <a href="{{ route('admin.distribusi.create') }}" class="btn btn-primary mb-3">+ Tambah Distribusi</a>
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
                                                        <img src="{{ asset('uploads/distribusi/images/' . $distribusi->foto_penyerahan) }}" width="80"
                                                            alt="Foto Penyerahan">
                                                    @else
                                                        <span class="text-muted">Tidak Ada</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($distribusi->created_at)->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.distribusi.edit', $distribusi->id) }}"
                                                        class="btn btn-sm btn-primary" title="Edit Status">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('admin.distribusi.destroy', $distribusi->id) }}"
                                                        method="POST" class="d-inline" id="delete-form-{{ $distribusi->id }}">
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
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');

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
        });
    </script>
@endsection
