@extends('layouts.admin')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                      <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                      <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Basic Table</h1> 
            </div>
            <div class="col-6">
                <div class="text-end upgrade-btn">
                    <a href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/" class="btn btn-primary text-white"
                        target="_blank">Upgrade to Pro</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    

    <div class="container-fluid">
        <div class="row">
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{ url('/tambahbookingservice') }}/{{ auth()->user()->id }}" id="contactform">
                {{ csrf_field() }}
                    <div class="card  shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: 	#1E1E2D;">Tambah Data Servis</h6>
                            <br>
                            <form action="" method="GET">
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <a  href="/index_get_user" class="btn btn-info"><i class="fa fa-plus" type="button"></i> Tambah Pengguna</a>
                                    </div>
                                </div>
                            </form>
                        <div>
                        
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Nama Pelanggan</label>
                                            <select class="user form-control @error('user') is-invalid @enderror" id="user" type="text" name="user" required>
                                                <option value="">Nama User</option>
                                                 @foreach($user as $usr)
                                                <option value="{{ $usr->id }}">{{ $usr->name }} - {{ $usr->address }}</option>
                                                @endforeach
                                            </select>
                                            @error('montir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1"> Nama STNK</label>
                                        <input type="text" class="form-control @error('name_stnk') is-invalid @enderror" name="name_stnk" id="name_stnk" placeholder="Masukkan nama yang tertera di STNK" required>
                                        @error('name_stnk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1"> Nomor PLAT</label>
                                        <input type="text" class="form-control @error('number_plat') is-invalid @enderror" name="number_plat" id="number_plat" placeholder="Masukkan nomor plat" required>
                                        @error('number_plat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Mobil</label>
                                        <input type="text" class="form-control @error('nama_mobil') is-invalid @enderror" name="nama_mobil" id="nama_mobil" placeholder="Masukkan nama mobil" required>
                                        @error('nama_mobil')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1"> Merek Mobil</label>
                                        <input type="text" class="form-control @error('jenis_mobil') is-invalid @enderror" name="jenis_mobil" id="jenis_mobil" placeholder="Masukkan Merek Mobil" required>
                                        @error('jenis_mobil')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Nama Montir</label>
                                        <select class="form-control @error('montir') is-invalid @enderror" id="montir" type="text" name="montir" required>
                                            <option value="">Nama Montir</option>
                                            @foreach($datamt as $mt)
                                            <option value="{{ $mt->name }}">{{ $mt->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('montir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6"  rows="7">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1"> Keluhan Mobil</label>
                                        <textarea rows="7" type="text" class="form-control  @error('service_complaint') is-invalid @enderror" name="complaint" id="complaint" placeholder="Masukkan keluhan mobil" required></textarea>
                                        @error('complaint')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                                <div class="modal-footer">
                                <a href="/bookingdata" class="btn btn-primary"><i></i>Kembali </a>
                                
                            <input type="submit" id="submit" class="btn btn-primary btn" value="Kirim">
                        </div>
                    </div>
                </form>
            </div>
        </div>
</section>
</div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet" href="select2.css">
<link rel="stylesheet" href="select2-bootstrap.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<script>
$(document).ready(function() {
    
    $('.user').select2({
        theme: 'bootstrap-5'
    })
    ;
    
});

</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection