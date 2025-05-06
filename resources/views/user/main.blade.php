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
    <div class="container-xxl bg-light py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Program Kami</h1>
                <p class="text-primary fs-5 mb-5">Buy, Sell And Exchange Cryptocurrency</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="img/icon-7.png" alt="">
                        <h5 class="mb-3">Currency Wallet</h5>
                        <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                            justo</p>
                        <a href="">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="img/icon-3.png" alt="">
                        <h5 class="mb-3">Currency Transaction</h5>
                        <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                            justo</p>
                        <a href="">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="img/icon-9.png" alt="">
                        <h5 class="mb-3">Bitcoin Investment</h5>
                        <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                            justo</p>
                        <a href="">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="img/icon-5.png" alt="">
                        <h5 class="mb-3">Currency Exchange</h5>
                        <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                            justo</p>
                        <a href="">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="img/icon-2.png" alt="">
                        <h5 class="mb-3">Bitcoin Escrow</h5>
                        <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                            justo</p>
                        <a href="">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="img/icon-8.png" alt="">
                        <h5 class="mb-3">Token Sale</h5>
                        <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                            justo</p>
                        <a href="">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- FAQs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">FAQs</h1>
                <p class="text-primary fs-5 mb-5">Frequently Asked Questions</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.1s">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    How to build a website?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How long will it take to get a new website?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Do you only create HTML websites?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    Will my website be mobile-friendly?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    Will you maintain my site for me?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    I’m on a strict budget. Do you have any low cost options?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.7s">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false"
                                    aria-controls="collapseSeven">
                                    Will you maintain my site for me?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse"
                                aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false"
                                    aria-controls="collapseEight">
                                    I’m on a strict budget. Do you have any low cost options?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse"
                                aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                    </div>
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
