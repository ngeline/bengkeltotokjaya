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
                                        <h1 class="text-white display-1">SERVICE DARURAT </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body ">
                            <form method="POST" action="{{ url('/bookingpanggilan') }}/{{ auth()->user()->id }}" id="contactform">
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
                                    <input class="form-control @error('jenis_mobil') is-invalid @enderror" type="text"
                                        name="jenis_mobil" placeholder="Masukkan Merek Mobil">
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
                                <!-- <div class="form-group">
                                    <label for="dokumen" class="form-label">Upload Dokumen <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('dokumen') is-invalid @enderror"
                                        type="file" id="dokumen" name="dokumen" accept=".pdf,.doc">
                                    @error('dokumen')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> -->
                                <div class="form-row">
                                    <div class="col-md-5 mb-3">
                                        <label for="validationCustom03">Map</label>
                                        <input type="text" class="form-control" id="validationCustom03" name="maps"
                                            placeholder="Masukkan link Maps" required>
                                            <p id="demo"></p>
                                        <div class="invalid-feedback">
                                            Please provide a valid city.
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-1 mb-3">
                                        <label for="validationCustom003">Search</label>
                                            <!-- <a href="https://google.co.id/maps/" target="_blank" class="btn form-control" style="background: #4D73DD; color: white;"><i
                                                        class="fa fa-map"></i></a> -->
                                                        <a onclick="getLocation()" target="_blank" class="btn form-control" style="background: #4D73DD; color: white;"><i
                                                        class="fa fa-map"></i></a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom04">Jalan</label>
                                        <input type="text" class="form-control" id="validationCustom04"  name="address_sp"
                                            placeholder="Jalan" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3 mb-3">
                                        <label for="validationCustom05">Foto</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid zip.
                                        </div>
                                    </div> -->
                                    <div class="col-md-3 mb-3">
                                        <label for="dokumen" class="form-label">Upload Foto<span
                                                class="text-danger">* </span></label> (Jpg,Jpeg)
                                        <input class="form-control @error('dokumen') is-invalid @enderror"  name="photo"
                                            type="file" id="dokumen" name="dokumen" accept=".jpg,.jpeg">
                                        @error('dokumen')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
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
                                    <textarea class="form-control @error('service_complaint') is-invalid @enderror"
                                        name="complaint" rows="7" placeholder="Masukkan keluhan mobil Anda"></textarea>
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
    <!-- <p>Click the button to get your coordinates.</p>

    <button onclick="getLocation()">Try It</button> -->

    

    <script>
        var x = document.getElementById("validationCustom03");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            $('#validationCustom03').val(position.coords.latitude+" ," + position.coords.longitude);
            x.innerHTML = + position.coords.latitude +
                " ," + position.coords.longitude;
        }
    </script>
</header>
<!-- CONTENT =============================-->

<!-- <script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
</script> -->

@endsection
