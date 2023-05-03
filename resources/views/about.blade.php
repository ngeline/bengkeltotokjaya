@extends('layouts.app')

@section('content')
<header class="item3 header margin-top-0" style="background-image: url({{ asset('argon-design-system-master') }}/assets/img/bgabout2.jpg);  width: 100%; " id="section-home" data-stellar-background-ratio="0.5">
    <div class="wrapper">
        <div class="container">
            <div class="row intro-text align-items-center ">
                <div class="col-md-10 animated tada"><br>
                    <h1 class="site-heading site-animate text-white" style="font-size: 67px;">
                        <strong class="d-block" data-scrollreveal="enter top over 1.5s after 0.1s">ABOUT US</strong>
                    </h1>
                </div>
            </div>
            <div class="item content">
                <div class="container rightarea">
                    <div class="col">
                        <h3 class="text-white">Bengkel Mobil Totok Jaya</h3>
                        <hr style="background-color: white;">
                        <p style="color: white; font-family: 'Lucida Console', 'Courier New', monospace; font-size: 15px">
                        Mobil merupakan aset berharga di masyarakat karena mobil dapat menjadi alat transportasi, hobi dan gaya hidup. Oleh karena itu perlu dilakukan perbaikan secara berkala agar tidak rusak. Bengkel Mobil Totok Jaya melayani perbaikan dan perawatan mobil yang menjamin kualitas pelayanan prima, cepat dan terjangkau.
                        </p>
                        <h3 class="text-white">E-mail</h3>
                        <hr style="background-color: white;">
                        <p style="color: white; font-family: 'Lucida Console', 'Courier New', monospace; font-size: 15px">
                            bengkeltotokjaya@gmail.com
                        </p>
                        <h3 class="text-white">Alamat</h3>
                        <hr style="background-color: white;">
                        <p style="color: white; font-family: 'Lucida Console', 'Courier New', monospace; font-size: 15px">
                        Jalan Raya, Jombok, Ngoro, Jombang Regency, East Java 61473
                        </p><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@endsection