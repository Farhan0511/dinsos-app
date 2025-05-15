@php
    $programs = [
        ['title' => 'Currency Wallet'],
        ['title' => 'Currency Transaction'],
        ['title' => 'Bitcoin Investment'],
        ['title' => 'Currency Exchange'],
        ['title' => 'Bitcoin Escrow'],
        ['title' => 'Token Sale'],
    ];
@endphp

<div class="container-xxl bg-light py-5 my-5">
    <div class="container py-5">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Program Kami</h1>
            <p class="text-primary fs-5 mb-5">Program Rehabilitasi Sosial</p>
        </div>
        <div class="row g-4">
            @foreach ($programs as $index => $program)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index % 3) * 0.2 }}s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="{{ asset('views/image/disabilitas.jpg') }}" alt="">
                        <h5 class="mb-3">{{ $program['title'] }}</h5>
                        <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita
                            duo justo</p>
                        <a href="">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
