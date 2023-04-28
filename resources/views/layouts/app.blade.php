<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argon-design-system-master') }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('argon-design-system-master') }}/assets/img/favicon.png">
    <!-- <title>
        Argon Design System by Creative Tim
    </title> -->

    <title>{{ config('', 'Bengkel Totok Jaya') }}</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{ asset('argon-design-system-master') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('argon-design-system-master') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('argon-design-system-master') }}/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="{{ asset('argon-design-system-master') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('argon-design-system-master') }}/assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
    <link href="{{ asset('assets/datatable') }}/datatables.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/custom.css" rel="stylesheet" />
</head>

<body class="index-page">
    <!-- Navbar -->
    <nav id="navbar-main"
        class="navbar navbar-main navbar-expand-lg bg-white navbar-light position-sticky top-0 shadow py-2">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="{{ asset('argon-design-system-master') }}/index.html">
                <img src="{{ asset('argon-design-system-master') }}/assets/img/brand/logo.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ asset('argon-design-system-master') }}/index.html">
                                <img src="{{ asset('argon-design-system-master') }}/assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item">
                        <a href="{{ route('home')}}" class="nav-link" href="#" role="button">
                            <i class="ni ni-collection d-lg-none"></i>
                            <span class="nav-link-inner--text">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span class="nav-link-inner--text">Layanan</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl">
                            <div class="dropdown-menu-inner">
                                <a href="{{ route('layanan') }}"
                                    class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                                        <i class="ni ni-spaceship"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Layanan Service</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Tidak perlu khawatir karena Bengkel Totok Jaya recommended untuk servis mesin mobil. Mulai dari mengatasi overhaul, tune up, ganti oli, ganti aki, dan lainnya.</p>
                                    </div>
                                </a>
                                <a href="{{ url('sparepart')}}"
                                    class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                                        <i class="ni ni-ui-04"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h5 class="heading text-warning mb-md-1">Suku Cadang</h5>
                                        <p class="description d-none d-md-inline-block mb-0">Suku cadang atau spare part mobil adalah sebuah komponen yang memiliki peran krusial dalam kondisi sebuah mobil. Selengkapnya lihat sparepart Kami.</p>
                                    </div>
                                </a>
                                <a href="{{ url('about') }}"
                                    class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-palette"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">About Us</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Kami adalah bengkel yang berpengalaman melayani perbaikan mobil servis mobil sejak Tahun 2005 dengan keahlian khusus.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span class="nav-link-inner--text">Service</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl">
                            <div class="dropdown-menu-inner">
                                <a href="{{ url('history') }}"
                                    class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                                        <i class="ni ni-settings"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Status Service</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Lihat status service mobil kamu secara Online.</p>
                                    </div>
                                </a>
                                <a href="{{ url('serviceHistory') }}"
                                    class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                                        <i class="ni ni-single-copy-04"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h5 class="heading text-warning mb-md-1">Riwayat Service</h5>
                                        <p class="description d-none d-md-inline-block mb-0">Cek riwayat service mobil kamu secara keseluruhan disini.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="{{ route('sparepart')}}" class="nav-link" href="#" role="button">
                            <i class="ni ni-collection d-lg-none"></i>
                            <span class="nav-link-inner--text">Sparepart</span>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="{{ route('contactCus')}}" class="nav-link" href="#" role="button">
                            <i class="ni ni-collection d-lg-none"></i>
                            <span class="nav-link-inner--text">Contact Us</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-collection d-lg-none"></i>
                            <span class="nav-link-inner--text">Service Panggilan</span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ asset('argon-design-system-master') }}/examples/landing.html" class="dropdown-item">Status Service</a>
                            <a href="{{ asset('argon-design-system-master') }}/examples/profile.html" class="dropdown-item">Riwayat Service</a>

                        </div>
                    </li> -->
                </ul>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.facebook.com/CreativeTim/" target="_blank"
                            data-toggle="tooltip" title="Like us on Facebook">
                            <i class="fa fa-facebook-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Facebook</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial"
                            target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                            <i class="fa fa-instagram"></i>
                            <span class="nav-link-inner--text d-lg-none">Instagram</span>
                        </a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="btn btn-outline-primary" href="{{ asset('argon-design-system-master') }}/examples/login.html"
                            target="_blank">
                            <span class="nav-link-inner--text">Login</span>
                        </a>
                    </li> -->
                    <!-- <li class="nav-item d-none d-lg-block">
                        <a href="{{ asset('argon-design-system-master') }}/examples/register.html"
                            target="_blank" class="btn btn-primary btn-icon">
                            <span class="btn-inner--icon">
                                <i class="fa fa-shopping-cart"></i>
                            </span>
                            <span class="nav-link-inner--text">Register</span>
                        </a>
                    </li> -->
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="btn btn-outline-primary" href="{{ route('login') }}" >{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item d-none d-lg-block">
                        <a class="btn btn-primary btn-icon" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else

                    <!-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="img-profile rounded-circle"  style="width:30px;height:30px;" src="{{ asset('images/notification.png') }}">
                            <span class="badge" style="background-color: 	#ff0000;"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" id="notifikasi" aria-labelledby="navbarDropdown">
                        </div>
                    </li> -->

                    <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            <img class="img-profile rounded-circle"  style="width:40px;height:40px;" src="{{ asset('flexy-bootstrap-lite') }}/assets/images/users/user.png">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('profile') }}">
                                Profil
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
    </div>



    <footer class="footer has-cards">

        <div class="container">
            <div class="row row-grid align-items-center my-md">
                <div class="col-lg-6">
                    <h3 class="text-primary font-weight-light mb-2">Thank you for supporting us!</h3>
                    <h4 class="mb-0 font-weight-light">Let's get in touch on any of these platforms.</h4>
                </div>
                <div class="col-lg-6 text-lg-center btn-wrapper">
                    <button target="_blank" href="https://twitter.com/creativetim" rel="nofollow"
                        class="btn btn-icon-only btn-twitter rounded-circle" data-toggle="tooltip"
                        data-original-title="Follow us">
                        <span class="btn-inner--icon"><i class="fa fa-twitter"></i></span>
                    </button>
                    <button target="_blank" href="https://www.facebook.com/CreativeTim/" rel="nofollow"
                        class="btn-icon-only rounded-circle btn btn-facebook" data-toggle="tooltip"
                        data-original-title="Like us">
                        <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                    </button>
                    <button target="_blank" href="https://dribbble.com/creativetim" rel="nofollow"
                        class="btn btn-icon-only btn-dribbble rounded-circle" data-toggle="tooltip"
                        data-original-title="Follow us">
                        <span class="btn-inner--icon"><i class="fa fa-dribbble"></i></span>
                    </button>
                    <button target="_blank" href="https://github.com/creativetimofficial" rel="nofollow"
                        class="btn btn-icon-only btn-github rounded-circle" data-toggle="tooltip"
                        data-original-title="Star on Github">
                        <span class="btn-inner--icon"><i class="fa fa-github"></i></span>
                    </button>
                </div>
            </div>
            <hr>
            <div class="row align-items-center justify-content-md-between">
                <div class="col-md-6">
                    <div class="copyright">
                        &copy; 2023 <a href="javascript:void(0)">Auto Service</a>.
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav nav-footer justify-content-end">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link" target="_blank">Auto Service</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link" target="_blank">About Us</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link" target="_blank">License</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <!--   Core JS Files   -->
    <script src="{{ asset('argon-design-system-master') }}/assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('argon-design-system-master') }}/assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('argon-design-system-master') }}/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/plugins/moment.min.js"></script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets/datatable') }}/datatables.min.js"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/argon-design-system.min.js?v=1.2.2" type="text/javascript"></script>
    @stack('js')
    <script>
        function scrollToDownload() {

            if ($('.section-download').length != 0) {
                $("html, body").animate({
                    scrollTop: $('.section-download').offset().top
                }, 1000);
            }
        }

    </script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-design-system-pro"
            });

    </script>
    @include('sweetalert::alert')
</body>

</html>
