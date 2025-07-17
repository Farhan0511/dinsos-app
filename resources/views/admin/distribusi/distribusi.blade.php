@extends('admin.main')

@section('title', 'Data Distribusi Bantuan')

@section('content')
    <!-- Tombol Tambah Data -->
    <div class="container">
        <div class="mt-5">
            <a href="{{ route('admin.createDistribusi') }}" class="btn btn-primary btn-lg fw-semibold px-4 py-2 "
                style="margin-top:2rem">
                + Tambah Data
            </a>
        </div>

        <!-- Tabel Data -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0">
                        <tbody>
                            @foreach ($data as $distribusi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $distribusi->nama }}</td>
                                    <td>{{ $distribusi->email }}</td>
                                    <td>{{ $distribusi->alamat }}</td>
                                    <td>{{ $distribusi->jenis_kelamin }}</td>
                                    <td>{{ $distribusi->jenis_bantuan }}</td>
                                    <td>{{ $distribusi->no_telepon }}</td>
                                    <td>
                                        @if ($distribusi->foto_penyerahan)
                                            <img src="{{ asset('storage/' . $distribusi->foto_penyerahan) }}" width="80"
                                                alt="Foto Penyerahan">
                                        @else
                                            <span class="text-muted">Tidak Ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.editDistribusi', $distribusi->id) }}"
                                            class="btn btn-sm btn-primary" title="Edit Status">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.destroyDistribusi', $distribusi->id) }}"
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
