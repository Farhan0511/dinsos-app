<div class="hero pt-5">
    <!-- Desktop -->
    <!-- Hero Section: Dinas Sosial Kota Serang -->
    <div class="d-none d-md-block py-5" >
        <div class="container">
            <div class="row align-items-center justify-content-around">

                <!-- Text Content -->
                <div class="col-md-6">
                    <h2 class="mb-4 display-5 fw-bold ">Dinas Sosial Kota Serang</h2>
                    <p class="fs-5 ">
                        Ayo kenali dan manfaatkan berbagai program bantuan dari Dinas Sosial Kota Serang untuk
                        mendukung kesejahteraan keluarga dan lingkungan sekitarmu!
                    </p>
                    <div class=" mt-4">
                        <a href="{{ route('input') }}" class="btn btn-primary">Daftar sekarang!</a>
                    </div>
                </div>

                <!-- Image Content -->
                <div class="col-md-5 ">
                    <img src="{{ asset('views/image/disabilitas.jpg') }}" alt="Program Bantuan Sosial"
                        class="img-fluid rounded shadow" style="max-height: 350px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>



    <!-- Mobile -->
    <div class="d-sm-block d-md-none">
        <div class="container">
            <div class="row align-items-center justify-content-around">
                <div class="col-md-5 text-center mb-4">
                    <img src="{{ asset('views/image/disabilitas.jpg') }}" alt="Hero Image" class="img-fluid"
                        width="400px">
                </div>
                <div class="col mt-3">
                    <h2 class="mb-3 display-5 fw-bold">Dinas Sosial Kota Serang</h2>
                    <p class="fs-5">
                        Ayo kenali dan manfaatkan berbagai program bantuan dari Dinas Sosial Kota Serang untuk
                        mendukung kesejahteraan keluarga dan lingkungan sekitarmu!
                    </p>
                    <a href="{{ route('input') }}" class="btn btn-primary">Daftar sekarang!</a>
                </div>

            </div>
        </div>

    </div>
</div>
