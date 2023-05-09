@extends('layouts.app')
@section('content')
<header class="item1 header margin-top-0"
    style="background-image: url({{ asset('argon-design-system-master') }}/assets/img/bg.png); width: 100%; "
    id="section-home" data-stellar-background-ratio="0.5">
    <div class="wrapper">
        <div class="container pt-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="page-header">
                        <div class="container shape-container d-flex align-items-center py-lg-2">
                            <div class="col">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-12 text-center">
                                        <h1 class="text-white display-1">BOOKING SERVICE</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body ">
                            <form method="POST" action="{{ url('/booking') }}/{{ auth()->user()->id }}" id="contactform">
								{{ csrf_field() }}
                                <div class="form-group">
                                <label for="validationCustom00">Nama STNK</label>
                                    <input class="form-control @error('name_stnk') is-invalid @enderror" type="text"
                                        name="name_stnk" placeholder="Masukkan Nama STNK">
                                    @error('name_stnk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label for="validationCustom01">Nomor Polisi</label>
                                    <input class="form-control @error('number_plat') is-invalid @enderror" type="text"
                                        name="number_plat" placeholder="Masukkan Nomor Polisi di STNK">
                                    @error('number_plat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                        <label for="validationCustom02">Merek Mobil</label>
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
                                <div class="form-group">
                                <label for="validationCustom02">Nama Mobil</label>
                                    <input class="form-control @error('nama_mobil') is-invalid @enderror" type="text"
                                        name="nama_mobil" placeholder="Masukkan Nama Mobil">
                                    @error('nama_mobil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom02">Service</label>
                                    <select
                                        class="service form-control @error('service') is-invalid @enderror"
                                        id="service" type="text" name="service" required>
                                        <option value="">Pilih Service</option>
                                        @foreach($service as $srv)
                                        <option value="{{ $srv->id }}">{{ $srv->name }}</option>
                                        @endforeach
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    @error('service')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleFormControlSelect1">Example select</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                <label for="validationCustom07">Keluhan Mobil</label>
                                    <textarea class="form-control @error('service_complaint') is-invalid @enderror" name="complaint" rows="7" placeholder="Masukkan keluhan mobil Anda"></textarea>
									@error('complaint')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
                                </div>
								<input type="submit" id="submit" class="clearfix btn btn-primary" value="Kirim">
                            </form>
                        </div>
                    </div><br><br>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- CONTENT =============================-->

@endsection
