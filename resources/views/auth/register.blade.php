<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('argon-design-system-master') }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('argon-design-system-master') }}/assets/img/favicon.png">
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
    <link href="{{ asset('argon-design-system-master') }}/assets/css/argon-design-system.css?v=1.2.2"
        rel="stylesheet" />
</head>

<body class="register-page">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light py-2">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="{{ route('home')}}">
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
                            <a
                                href="{{ asset('argon-design-system-master') }}/{{ asset('argon-design-system-master') }}/{{ asset('argon-design-system-master') }}/index.html">
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
                        <a href="{{ route('home')}}" class="nav-link" href="{{ route('home')}}" role="button">
                            <i class="ni ni-collection d-lg-none"></i>
                            <span class="nav-link-inner--text">Beranda</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <section class="section section-shaped section-lg">
            <div class="shape shape-style-1 bg-gradient-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="container pt-lg-3">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <h3>REGISTER</h3>
                                </div>
                                <form role="form" method="POST" action="{{ route('register.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                    </div>
                                                    <input class="form-control" type="text" id="name" name="name"
                                                        placeholder="Nama" alue="{{ old('name') }}" required
                                                        autocomplete="name">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                    </div>
                                                    <input class="form-control" id="email" type="text" name="email"
                                                        placeholder="Email" value="{{ old('email') }}" required
                                                        autocomplete="email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group focused">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="ni ni-lock-circle-open"></i></span>
                                                    </div>
                                                    <input class="form-control" id="password" type="password" name="password"
                                                        placeholder="Password" required autocomplete="new-password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group focused">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="ni ni-lock-circle-open"></i></span>
                                                    </div>
                                                    <input class="form-control" id="password" tid="password-confirm"
                                                        name="password_confirmation" type="password"
                                                        placeholder="Konfirmasi Password" required autocomplete="new-password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-alternative mb-3">
                                                <input class="form-control" type="text" id="name_stnk" name="name_stnk"
                                                    placeholder="Nama STNK" alue="{{ old('name_stnk') }}" required
                                                    autocomplete="name_stnk">
                                                @error('name_stnk')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="input-group input-group-alternative mb-3">
                                                <input class="form-control" type="text" id="number_plat" name="number_plat"
                                                    placeholder="Plat Nomor" alue="{{ old('number_plat') }}" required
                                                    autocomplete="number_plat">
                                                @error('number_plat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="input-group input-group-alternative mb-3">
                                                <input class="form-control" type="text" id="nama_mobil" name="nama_mobil"
                                                    placeholder="Nama Mobil" alue="{{ old('nama_mobil') }}" required
                                                    autocomplete="nama_mobil">
                                                @error('nama_mobil')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <select class="user form-control @error('jenis_mobil') is-invalid @enderror"
                                                    id="jenis_mobil" type="text" name="jenis_mobil" required>
                                                    <option value="">Merek Mobil</option>
                                                    @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->name }}">
                                                        {{ $categorie->name }}</option>
                                                    @endforeach
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                                @error('jenis_mobil')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div> -->
                                    <div class="row my-4 text-center">
                                        <div class="col-12">
                                            <div class="custom-control custom-control-alternative custom-checkbox">
                                                <input class="custom-control-input" id="customCheckRegister"
                                                    type="checkbox">
                                                <label class="custom-control-label" for="customCheckRegister"><span>I
                                                        agree with the <a href="#">Privacy Policy</a></span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-4">{{ __('Register') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6 text-right">Sudah punya akun?
                                <a href="{{ route('login') }}" class="text-light"><small> Login</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="container">
                <hr>
                <div class="row align-items-center justify-content-md-between">
                    <div class="col-md-6">
                        <div class="copyright">
                            &copy; 2020 <a href="" target="_blank">Creative Tim</a>.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav nav-footer justify-content-end">
                            <li class="nav-item">
                                <a href="" class="nav-link" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('argon-design-system-master') }}/assets/js/core/jquery.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/core/popper.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/core/bootstrap.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('argon-design-system-master') }}/assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('argon-design-system-master') }}/assets/js/plugins/nouislider.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/plugins/moment.min.js"></script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/plugins/datetimepicker.js" type="text/javascript">
    </script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="{{ asset('argon-design-system-master') }}/assets/js/argon-design-system.min.js?v=1.2.2"
        type="text/javascript"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-design-system-pro"
            });

    </script>
</body>

</html>
