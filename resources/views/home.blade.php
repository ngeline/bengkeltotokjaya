@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="section section-hero section-shaped"
        style="background-image: url({{ asset('argon-design-system-master') }}/assets/img/bg.png); width: 100%; ">
        <div class="shape shape-style-3 shape-default">
        </div>
        <div class="page-header">
            <div class="container shape-container d-flex align-items-center py-lg">
                <div class="col">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-12 text-center">
                            <h1 class="text-white display-1">BENGKEL TOTOK JAYA </h1>
                            <h1 class="text-white display-1">MEKANIK PROFESIONAL</h1>
                            <h2 class="display-4 font-weight-normal text-white">Melayani perbaikan mobil</h2>
                            <h2 class="display-4 font-weight-normal text-white">Servis Mobil. Mekanik Bersertifikasi.
                                Teknologi Tercanggih. Garansi 3 Bulan.</h2>
                            <div class="btn-wrapper mt-4">
                                <a href="/booking" class="btn btn-warning btn-icon mt-3 mb-sm-0">
                                    <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
                                    <span class="btn-inner--text">BOOKING SERVICE</span>
                                </a>
                                <a href="/bookingpanggilan" class="btn btn-warning btn-icon mt-3 mb-sm-0">
                                    <span class="btn-inner--icon"><i class="ni ni-delivery-fast"></i></span>
                                    <span class="btn-inner--text">SERVICE PANGGILAN</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <div class="section features-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <!-- <span class="badge badge-primary badge-pill mb-3">Insight</span> -->
                    <h3 class="display-3">Bagaimana Kerja Kami ?</h3><br>
                    <!-- <p class="lead">Memperbaiki mobil Anda seharusnya mudah.</p><br> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="info">
                        <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                            <i class="ni ni-settings-gear-65"></i>
                        </div>
                        <h6 class="info-title text-uppercase text-primary">Perbaikan</h6>
                        <p class="description opacity-8">Perbaikan akan dilakukan setelah Anda menyetujui rincian biaya
                            yang dikenakan.</p>
                        <!-- <a href="javascript:;" class="text-primary">More about us
                            <i class="ni ni-bold-right text-primary"></i>
                        </a> -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info">
                        <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                            <i class="ni ni-atom"></i>
                        </div>
                        <h6 class="info-title text-uppercase text-success">Diagnosa & Estimasi</h6>
                        <p class="description opacity-8">Kami akan mengecek kendaraan anda serta memberikan diagnosa &
                            estimasi biaya secara transparan.
                        </p>
                        <!-- <a href="javascript:;" class="text-primary">Learn about our products
                            <i class="ni ni-bold-right text-primary"></i>
                        </a> -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info">
                        <div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
                            <i class="ni ni-world"></i>
                        </div>
                        <h6 class="info-title text-uppercase text-warning">Hubungi Kami</h6>
                        <p class="description opacity-8">Isi keterangan dan permasalahan kendaraan Anda, atau hubungi
                            kami di nomor 081808182277.</p>
                        <!-- <a href="javascript:;" class="text-primary">Check our documentation
                            <i class="ni ni-bold-right text-primary"></i>
                        </a> -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info">
                        <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                            <i class="ni ni-settings-gear-65"></i>
                        </div>
                        <h6 class="info-title text-uppercase text-primary">Penjadwalan</h6>
                        <p class="description opacity-8">Silakan tentukan waktu dan lokasi yang anda inginkan kepada
                            mekanik kami.</p>
                        <!-- <a href="javascript:;" class="text-primary">More about us
                            <i class="ni ni-bold-right text-primary"></i>
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section features-6">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <div class="info info-horizontal info-hover-primary">
                        <div class="col-md-12 mx-auto text-center">
                            <h2 class="display-5"> <span class="text-primary">Manfaat service mobil secara rutin</span></h2>
                        </div>
                        <div class="description pl-4">
                            <h5 class="title">Mobil Tetap Prima</h5>
                            <p>Servis yang rutin sesuai aturan membuat kinerja mobil tetap cemerlang dan bisa melaju
                                dengan prima.</p>
                        </div>
                    </div>
                    <div class="info info-horizontal info-hover-primary mt-5">
                        <div class="description pl-4">
                            <h5 class="title">Berkendara Semakin Nyaman Dan Aman</h5>
                            <p>Servis mobil secara berkala memberi peluang bagi Anda dan pihak bengkel mengetahui
                                komponen mana saja yang sudah perlu diganti atau diperbaiki.</p>
                        </div>
                    </div>
                    <!-- <div class="info info-horizontal info-hover-primary mt-5">
                        <div class="description pl-4">
                            <h5 class="title">Hemat Biaya</h5>
                            <p>Jangan lupa kalau servis kendaraan secara berkala mengurangi risiko kantong Anda boros di masa yang akan datang.</p>
                        </div>
                    </div>
                    <div class="info info-horizontal info-hover-primary mt-5">
                        <div class="description pl-4">
                            <h5 class="title">Manfaatkan Promo Dan Paket Servis</h5>
                            <p>Pada kesempatan tertentu, biasanya bengkel mobil akan melakukan promo dalam rangka perayaan hari besar tertentu.</p>
                        </div>
                    </div> -->
                    <div class="info info-horizontal info-hover-primary mt-5">
                        <div class="description pl-4">
                            <h5 class="title">Umur Kendaraan Lebih Lama</h5>
                            <p>Mobil yang diberi jatah servis berkala memiliki usia yang relatif lebih lama.</p>
                        </div>
                    </div>
                    <div class="info info-horizontal info-hover-primary mt-5">
                        <div class="description pl-4">
                            <h5 class="title">Nilai Jual Kendaraan Stabil</h5>
                            <p>Performa mobil yang baik dan terjaga serta jaminan kenyamanan dan keamanan yang tetap
                                ada, membuat nilai jual mobil lebih stabil.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-10 mx-md-auto">
                    <img class="ml-lg-5" src="{{ asset('argon-design-system-master') }}/assets/img/manfaat.png"
                        width="100%">
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section section-lg">
    <div class="container">
        <div class="row row-grid justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-3">Alasan Servis Rutin Lebih Baik <span class="text-success">di Bengkel Mobil Totok
                        Jaya</span></h2>
                <p class="lead">Teknisi yang sudah terlatih, Mempertahankan garansi mobil, Spare part yang digunakan
                    terjamin,Menggunakan peralatan yang lengkap,Riwayat servis lengkap, Terdapat customer service, Bisa
                    Booking Service dan Service Panggilan!</p>
                <div class="btn-wrapper">
                    <a href="/booking" class="btn btn-primary mb-3 mb-sm-0">BOOKING SERVICE</a>
                    <a href="/bookingpanggilan" class="btn btn-default">SERVICE PANGGILAN</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="section" style="background-image: url({{ asset('argon-design-system-master') }}/assets/img/bookingservis.png');">
    <div class="container py-md">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 mb-lg-auto">
                <div class="rounded overflow-hidden transform-perspective-left">
                    <div id="carousel_example" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel_example" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel_example" data-slide-to="1"></li>
                            <li data-target="#carousel_example" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="img-fluid" src="{{ asset('argon-design-system-master') }}/assets/img/bookingservis.png" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="img-fluid" src="{{ asset('argon-design-system-master') }}/assets/img/bookingservis2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="img-fluid" src="{{ asset('argon-design-system-master') }}/assets/img/bookingservis3.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel_example" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel_example" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mb-5 mb-lg-0">
                <h1 class="font-weight-light">Booking Service</h1>
                <p class="lead mt-4">Untuk melakukan booking servis kendaraan Anda, silakan klik button dibawah ini serta mengisi form. Admin Bengkel Totok Jaya akan memproses data Anda.</p>
                <a href="/booking"
                    class="btn btn-white mt-4">MULAI</a>
            </div>
        </div>
    </div>
</div>
<div class="section" style="background-image: url({{ asset('argon-design-system-master') }}/assets/img/ill/1.svg');">
    <div class="container py-md">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <h1 class="font-weight-light">Service Panggilan</h1>
                <p class="lead mt-4">Untuk melakukan servis kendaraan Anda, silakan klik button dibawah ini serta mengisi form. Admin Bengkel Totok Jaya akan menghubungi Anda segera.</p>
                <a href="/bookingpanggilan"
                    class="btn btn-white mt-4">MULAI</a>
            </div>
            <div class="col-lg-6 mb-lg-auto">
                <div class="rounded overflow-hidden transform-perspective-left">
                    <div id="carousel_example" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel_example" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel_example" data-slide-to="1"></li>
                            <li data-target="#carousel_example" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="img-fluid" src="{{ asset('argon-design-system-master') }}/assets/img/servispanggilan.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="img-fluid" src="{{ asset('argon-design-system-master') }}/assets/img/servispanggilan2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="img-fluid" src="{{ asset('argon-design-system-master') }}/assets/img/servispanggilan3.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel_example" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel_example" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<section class="section section-lg">
    <div class="container">
        <div class="row row-grid justify-content-center">
            <div class="col-lg-8 text-center">

                <div class="text-center">
                    <h4 class="display-4 mb-5 mt-5">Available on these technologies</h4>
                    <div class="row justify-content-center">
                        <div class="col-lg-2 col-4">
                            <a href="https://www.creative-tim.com/product/argon-design-system" target="_blank"
                                data-toggle="tooltip"
                                data-original-title="Bootstrap 4 - Most popular front-end component library">
                                <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/bootstrap.jpg"
                                    class="img-fluid">
                            </a>
                        </div>
                        <div class="col-lg-2 col-4">
                            <a href=" https://www.creative-tim.com/product/vue-argon-design-system" target="_blank"
                                data-toggle="tooltip"
                                data-original-title="Vue.js - The progressive javascript framework">
                                <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/vue.jpg"
                                    class="img-fluid">
                            </a>
                        </div>
                        <div class="col-lg-2 col-4">
                            <a href=" https://www.creative-tim.com/product/argon-design-system-angular" target="_blank"
                                data-toggle="tooltip"
                                data-original-title="Angular - One framework. Mobile &amp; desktop">
                                <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/angular.jpg"
                                    class="img-fluid">
                            </a>
                        </div>
                        <div class="col-lg-2 col-4">
                            <a href=" https://www.creative-tim.com/product/argon-design-system-react" target="_blank"
                                data-toggle="tooltip"
                                data-original-title="React - A JavaScript library for building user interfaces">
                                <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/react.jpg"
                                    class="img-fluid">
                            </a>
                        </div>
                        <div class="col-lg-2 col-4">
                            <a href=" https://www.creative-tim.com/product/argon-design-system" target="_blank"
                                data-toggle="tooltip" data-original-title="Sketch - Digital design toolkit">
                                <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/sketch.jpg"
                                    class="img-fluid">
                            </a>
                        </div>
                        <div class="col-lg-2 col-4">
                            <a href=" https://www.creative-tim.com/product/argon-design-system" target="_blank"
                                data-toggle="tooltip"
                                data-original-title="Adobe Photoshop - Software for digital images manipulation">
                                <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/ps.jpg"
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <div class="container container-lg">
    <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
            <div class="card card-lift--hover shadow border-0">
                <a href="{{ asset('argon-design-system-master') }}/examples/landing.html" title="Landing Page">
                    <img src="{{ asset('argon-design-system-master') }}/assets/img/theme/landing.jpg" class="card-img">
                </a>
            </div>
        </div>
        <div class="col-md-6 mb-5 mb-lg-0">
            <div class="card card-lift--hover shadow border-0">
                <a href="{{ asset('argon-design-system-master') }}/examples/profile.html" title="Profile Page">
                    <img src="{{ asset('argon-design-system-master') }}/assets/img/theme/profile.jpg" class="card-img">
                </a>
            </div>
        </div>
    </div>
</div> -->
@endsection
