@extends('admin.main')

@section('title', 'Data | Penerima')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Penerima</h3>
            </div>
            <div class="w-100">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Penerima</div>
                        </div>
                        <div class="card-body">
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
                                            <th>Tanggal Pengambilan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
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
                                                            data-img="{{ asset('uploads/users/ktp/' . $p->GetUser->fotoKtp) }}"
                                                            alt="Foto KTP" width="100" class="zoomable-img">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($p->GetUser->fotoRumah)
                                                        <img src="{{ asset('uploads/users/rumah/' . $p->GetUser->fotoRumah) }}"
                                                            data-img="{{ asset('uploads/users/rumah/' . $p->GetUser->fotoRumah) }}"
                                                            alt="Foto Rumah" width="100" class="zoomable-img">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($p->GetUser->fotoDiri)
                                                        <img src="{{ asset('uploads/users/fotodiri/' . $p->GetUser->fotoDiri) }}"
                                                            data-img="{{ asset('uploads/users/fotodiri/' . $p->GetUser->fotoDiri) }}"
                                                            alt="Foto Diri" width="100" class="zoomable-img">
                                                    @else
                                                        <span class="text-muted">Belum Upload</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($p->tanggal_pengambilan)->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    <span class="text-success">
                                                        <i class="fas fa-check-circle"></i> Diterima
                                                    </span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.send.email') }}" method="POST"
                                                        style="margin-top: 5px;">
                                                        @csrf
                                                        <input type="hidden" name="nama"
                                                            value="{{ $p->GetUser->nama }}">
                                                        <input type="hidden" name="email"
                                                            value="{{ $p->GetUser->email }}">
                                                        <input type="hidden" name="jenis_bantuan"
                                                            value="{{ $p->GetUser->jenisBantuan }}">
                                                        <input type="hidden" name="tanggal_pengambilan"
                                                            value="{{ $p->tanggal_pengambilan }}">

                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-envelope"></i> Kirim Email
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

    {{-- Load SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Zoom Gambar dengan SweetAlert2 --}}
    <script>
        document.querySelectorAll('.zoomable-img').forEach(img => {
            img.addEventListener('click', function() {
                const imageUrl = this.getAttribute('data-img');

                Swal.fire({
                    imageUrl: imageUrl,
                    imageAlt: 'Foto Penerima',
                    showConfirmButton: false,
                    showCloseButton: true,
                    width: 'auto',
                    padding: '1em',
                    background: '#fff',
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
@endsection
