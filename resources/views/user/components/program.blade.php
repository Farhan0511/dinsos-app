@php
    $programs = [
        [
            'title' => 'Layanan Informasi Disabilitas',
            'image' => 'disabilitas3.jpg',
            'desc' =>
                'Memberikan informasi dan edukasi mengenai hak, fasilitas, serta program-program yang tersedia bagi penyandang disabilitas.',
        ],
        [
            'title' => 'Pendaftaran Bantuan Sosial',
            'image' => 'disabilitas5.png',
            'desc' =>
                'Fitur untuk melakukan pendaftaran bantuan sosial secara online bagi masyarakat penyandang disabilitas.',
        ],
        [
            'title' => 'Layanan Konsultasi & Pengaduan',
            'image' => 'disabilitas4.jpg',
            'desc' =>
                'Fasilitas pengaduan dan konsultasi daring terkait pelayanan atau kendala dalam penerimaan bantuan sosial.',
        ],
        [
            'title' => 'Rehabilitasi Sosial & Keterampilan',
            'image' => 'disabilitas9.jpeg',
            'desc' =>
                'Program pelatihan dan pengembangan keterampilan untuk meningkatkan kemandirian penyandang disabilitas.',
        ],
        [
            'title' => 'Verifikasi dan Penyaluran Bantuan',
            'image' => 'disabilitas 5.jpeg',
            'desc' =>
                'Sistem pendataan dan verifikasi calon penerima manfaat serta pelacakan distribusi bantuan yang transparan.',
        ],
        [
            'title' => 'Hari Disabilitas Internasional',
            'image' => 'disabilitas10.jpeg',
            'desc' => 'Informasi dan publikasi kegiatan dalam rangka memperingati Hari Disabilitas Internasional.',
        ],
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
                        <img class="img-fluid mb-4" src="{{ asset('views/image/' . $program['image']) }}"
                            alt="{{ $program['title'] }}">
                        <h5 class="mb-3">{{ $program['title'] }}</h5>
                        <p>{{ $program['desc'] }}</p>
                        <a href="#">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
