@extends('user.main')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Berita Terbaru</h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($beritas as $berita)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                class="card-img-top" alt="Gambar Berita"
                                style="height: 220px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <p class="text-muted mb-1">
                                Ditulis oleh {{ $berita->penulis }} |
                                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                            </p>
                            <p class="card-text"><strong>Kategori:</strong> {{ $berita->kategori }}</p>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($berita->isi, 100, '...') }}</p>
                            <div class="mt-auto">
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada berita untuk saat ini.</p>
            @endforelse
        </div>
    </div>
@endsection
