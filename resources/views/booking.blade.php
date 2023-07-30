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
                            @if($errors->first('message'))
                            <div class="row">
                                <div class="col-md-12 bg-danger p-3 rounded">
                                    <span class="w-100 text-white">{{ $errors->first('message') }}</span>
                                </div>
                            </div>
                            @endif
                            
                            <form method="POST" action="{{ url('/booking') }}/{{ auth()->user()->id }}"
                                id="contactform">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">List Mobil Dimiliki <span class="text-danger"><small>jika tidak ada langsung input info kedaraan dibawah</small></span></label>
                                    <select name="owned_cars" id="owned_cars" class="form-control">
                                        <option value="">Mobil yang dimiliki</option>
                                        @foreach ($owned_cars as $item)
                                            <option value="{{$item->id}}">{{$item->nama_mobil}}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                                <div class="form-row">
                                    <div class="col-md-7 mb-3">
                                    <label for="validationCustom02">Service</label>
                                    <select class="service form-control @error('service') is-invalid @enderror"
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
                                
                                    <div class="col-md-5 mb-3">
                                        <label for="validationCustom02">Tanggal Service</label>
                                        <input class="form-control @error('service_date') is-invalid @enderror" type="date"
                                            name="service_date" placeholder="Masukkan Tanggal Service">
                                        @error('service_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
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
                                            name="complaint" rows="7"
                                            placeholder="Masukkan keluhan mobil Anda"></textarea>
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

<script>
    let arr_owned_cars = [];

    <?php foreach($owned_cars as $item) : ?>
        arr_owned_cars.push(['<?= $item->id ?>', '<?= $item->name_stnk ?>', '<?= $item->number_plat ?>', '<?= $item->nama_mobil ?>', '<?= $item->jenis_mobil ?>'])
    <?php endforeach; ?>

    let owned_cars = document.getElementById('owned_cars');
    owned_cars.addEventListener('change', function () {
        let this_val = $(this).val();
        if (this_val) {
            for (let index = 0; index < arr_owned_cars.length; index++) {
                const element = arr_owned_cars[index];
                if (element[0] == this_val) {
                    $('[name="name_stnk"]').val(element[1]);
                    $('[name="number_plat"]').val(element[2]);
                    $('[name="nama_mobil"]').val(element[3]);
                    $('[name="jenis_mobil"]').val(element[4]);

                    $('[name="name_stnk"]').attr('readonly', true);
                    $('[name="number_plat"]').attr('readonly', true);
                    $('[name="nama_mobil"]').attr('readonly', true);
                    $('[name="jenis_mobil"]').attr('readonly', true);
                }
            }
        } else {
            $('[name="name_stnk"]').val('');
            $('[name="number_plat"]').val('');
            $('[name="nama_mobil"]').val('');
            $('[name="jenis_mobil"]').val('');
            
            $('[name="name_stnk"]').attr('readonly', false);
            $('[name="number_plat"]').attr('readonly', false);
            $('[name="nama_mobil"]').attr('readonly', false);
            $('[name="jenis_mobil"]').attr('readonly', false);
        }
    });
</script>
@endsection
