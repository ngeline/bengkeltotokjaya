@extends('layouts.app')

@section('content')

<section class="section section-lg">
    <div class="container">
        <div class="row row-grid justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-3">Anda dapat menggunakan layanan service yang kami sediakan!</h2>
                <span class="text-sm">
                    Tidak perlu khawatir karena Bengkel Totok Jaya recommended untuk servis mesin mobil. Mulai dari mengatasi overhaul, tune up dan lainnya.
                </span>
                <div class="btn-wrapper">
                    <a href="/booking" class="btn btn-warning btn-icon mt-3 mb-sm-0">
                        <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
                        <span class="btn-inner--text">BOOKING SERVICE</span>
                    </a>
                    <a href="/bookingpanggilan" class="btn btn-warning btn-icon mt-3 mb-sm-0">
                        <span class="btn-inner--icon"><i class="ni ni-delivery-fast"></i></span>
                        <span class="btn-inner--text">SERVICE DARURAT</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
