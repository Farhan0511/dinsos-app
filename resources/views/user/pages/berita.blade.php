@extends('user.main')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Berita Terbaru</h2>

        @foreach ($beritas as $berita)
            <div class="card mb-3 shadow-sm">
                <div class="row g-0">
                    @if ($berita->gambar)
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded-start"
                                alt="Gambar Berita">
                        </div>
                    @endif
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <p class="card-text">
                                <small class="text-muted">Ditulis oleh {{ $berita->penulis }} |
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                                </small>
                            </p>
                            <p class="card-text"><strong>Kategori:</strong> {{ $berita->kategori }}</p>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($berita->isi, 200, '...') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if (count($beritas) == 0)
            
            <p>Belum ada berita untuk saat ini.</p>
        @endif
    </div>
@endsection
