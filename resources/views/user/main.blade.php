<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dinas Sosial Kota Serang</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('views/user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('views/user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('views/user/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('views/user/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->
    
    <!-- Navbar Start -->
    @include('user.components.navbar')
    <!-- Navbar End -->


    <!-- Hero Start -->
    @include('user.pages.hero')
    <!-- Hero End -->

    {{-- @include('user.pages.form-pendaftar') --}}

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="{{ asset('views/image/disabilitas.jpg') }}" alt="">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6">Tentang Kami!</h1>
                        <p class="text-primary fs-5 mb-4">Dinas Sosial Kota Serang</p>
                        <p>
                            Dinas Sosial Kota Serang adalah lembaga pemerintah yang bertugas dalam meningkatkan
                            kesejahteraan masyarakat,
                            khususnya kelompok rentan seperti lansia, penyandang disabilitas, anak-anak, dan keluarga
                            kurang mampu.
                        </p>
                        <p class="mb-4">
                            Kami menyediakan berbagai layanan sosial, program bantuan, serta kegiatan pemberdayaan
                            masyarakat yang bertujuan
                            untuk menciptakan kehidupan yang lebih layak dan berkeadilan sosial di seluruh wilayah Kota
                            Serang.
                        </p>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                            <span>Pelayanan sosial cepat, tepat, dan responsif</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                            <span>Dukungan bagi masyarakat miskin dan rentan</span>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                            <span>Kolaborasi aktif dengan masyarakat dan lembaga sosial</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About End -->

    <!-- Service Start -->
    @include('user.pages.program')
    <!-- Service End -->

    <!-- FAQs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6">FAQs</h1>
                <p class="text-primary fs-5 mb-5">Pertanyaan yang Sering Diajukan seputar Layanan Rehabilitasi Sosial
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="accordionExample">
                        <!-- FAQ 1 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.1s">
                            <h2 class="accordion-header" id="faq1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    Bagaimana cara mendapatkan bantuan sosial dari Dinas Sosial?
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Anda dapat mengajukan permohonan melalui kelurahan setempat atau datang langsung ke
                                    kantor Dinas Sosial dengan membawa dokumen persyaratan seperti KTP, KK, dan surat
                                    keterangan tidak mampu.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                            <h2 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    Apa saja jenis bantuan yang disediakan oleh Dinas Sosial?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Semua bantuan yang diberikan Dinas Sosial bertujuan untuk rehabilitasi sosial,
                                    termasuk
                                    bantuan sembako, tunai, layanan bagi lansia, penyandang disabilitas, anak terlantar,
                                    serta program pemulihan lainnya.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
                            <h2 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    Apakah Dinas Sosial memberikan bantuan bencana?
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Ya, Dinas Sosial memiliki tim tanggap darurat dan menyediakan bantuan logistik serta
                                    layanan rehabilitasi sosial bagi korban bencana seperti kebakaran, banjir, dan
                                    lainnya.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                            <h2 class="accordion-header" id="faq4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    Bagaimana cara melaporkan orang dengan gangguan jiwa (ODGJ) di lingkungan saya?
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Anda dapat melaporkannya melalui kelurahan, RT/RW, atau langsung ke Dinas Sosial
                                    agar tim kami dapat menindaklanjuti dengan pendekatan rehabilitasi sosial.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
                            <h2 class="accordion-header" id="faq5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    Bagaimana saya bisa menjadi relawan sosial?
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="faq5"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Untuk menjadi relawan, Anda dapat mendaftar melalui program rehabilitasi sosial
                                    resmi
                                    Dinas Sosial atau mengikuti kegiatan komunitas yang bekerja sama dengan kami.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 6 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                            <h2 class="accordion-header" id="faq6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                    Bagaimana saya bisa mengecek status bantuan yang saya ajukan?
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="faq6"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Status bantuan dapat dicek melalui website resmi Dinas Sosial atau datang langsung
                                    ke kantor dengan membawa nomor registrasi permohonan.
                                </div>
                            </div>
                        </div>

                    </div> <!-- end accordion -->
                </div>
            </div>
        </div>
    </div>


    <!-- FAQs Start -->

    {{-- Footer --}}
    @include('user.components.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('views/user/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('views/user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('views/user/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('views/user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('views/user/lib/counterup/counterup.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('views/user/js/main.js') }}"></script>
</body>

</html>
