@extends('layouts.app')
@section('content')
<header class="item1 header margin-top-0" style="background-image: url(images/mobil.jpg);  width: 100%;
    height: 800px; " id="section-home" data-stellar-background-ratio="0.5">
    <div class="wrapper">
        <div class="container pt-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-white pb-3">
                            <h1 class="site-heading site-animate" style="font-size: 47px;">
                                <div class="text-muted text-center mb-3"><strong>Layanan Pemesanan Servis</strong></div>
                            </h1>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <form method="POST" action="{{ url('/booking') }}/{{ auth()->user()->id }}" id="contactform">
								{{ csrf_field() }}
                                <div class="form-group">
                                    <input  class="form-control @error('name_stnk') is-invalid @enderror" type="text" name="name_stnk" placeholder="Masukkan nama yang tertera di STNK">
									@error('name_stnk')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
                                </div>
								<div class="form-group">
                                    <input  class="form-control @error('number_plat') is-invalid @enderror" type="text" name="number_plat" placeholder="Masukkan nomor plat Anda">
									@error('number_plat')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
                                </div>
								<div class="form-group">
                                    <input  class="form-control @error('nama_mobil') is-invalid @enderror" type="text" name="nama_mobil" placeholder="Masukkan nama mobil">
									@error('nama_mobil')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
                                </div>
								<div class="form-group">
                                    <input  class="form-control @error('jenis_mobil') is-invalid @enderror" type="text" name="jenis_mobil" placeholder="Masukkan Merek Mobil">
									@error('jenis_mobil')
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- CONTENT =============================-->

@endsection
