@extends('layouts.app')
@section('content')
<div class="container py-4">
    <br><br><br>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Booking</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Booking</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-body" style="color: black;">
                    @if(!empty($booking))
                    <p style="color: #008080">Status booking {{ $booking->status }} / A.n {{ $booking->name_stnk }} </p>
                    <p>No. Booking : {{ $booking->no_antrian }} / Tanggal Booking : {{ $booking->service_date }}</p><br>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 style="color: #1a9bfc;"><i class="fas fa-history" style="color: #1a9bfc;"></i>
                                    Detail Booking</h4>
                                <table class="table">
                                    <tbody>
                                        @foreach($bookings as $booking)
                                        <tr>
                                            <td>Nama STNK</td>
                                            <td>:</td>
                                            <td>{{ $booking->name_stnk }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Mobil</td>
                                            <td>:</td>
                                            <td>{{ $booking->nama_mobil }}</td>
                                        </tr>
                                        <tr>
                                            <td>Merek Mobil</td>
                                            <td>:</td>
                                            <td>{{ $booking->jenis_mobil }}</td>
                                        </tr>
                                        <tr>
                                            <td>Plat Mobil</td>
                                            <td>:</td>
                                            <td>{{ $booking->number_plat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Keluhan</td>
                                            <td>:</td>
                                            <td>{{ $booking->complaint }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 style="color: #8B0000;"><i style="color: #8B0000;" class="fa fa-pencil-alt"></i> Edit Booking</h4>
                    <br>
                    <form method="POST" action="{{ url('historyEdit') }}/{{ $booking->id }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name_stnk" class="col-md-2 col-form-label text-md-right">Nama STNK</label>

                            <div class="col-md-6">
                                <input style="background-color: #ecebeb; color: black;" id="name_stnk" type="text" class="form-control @error('name_stnk') is-invalid @enderror" name="name_stnk" value="{{ $booking->name_stnk }}">

                                @error('name_stnk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number_plat" class="col-md-2 col-form-label text-md-right">Plat Mobil</label>

                            <div class="col-md-6">
                                <input style="background-color: #ecebeb; color: black;" id="number_plat" type="text" class="form-control @error('number_plat') is-invalid @enderror" name="number_plat" value="{{ $booking->number_plat }}">

                                @error('number_plat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nama_mobil" class="col-md-2 col-form-label text-md-right">Nama Mobil</label>

                            <div class="col-md-6">
                                <input style="background-color: #ecebeb; color: black;" id="nama_mobil" type="text" class="form-control @error('nama_mobil') is-invalid @enderror" name="nama_mobil" value="{{ $booking->nama_mobil }}" required autocomplete="nama_mobil">

                                @error('nama_mobil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis_mobil" class="col-md-2 col-form-label text-md-right">Merek Mobil</label>

                            <div class="col-md-6">
                                <input style="background-color: #ecebeb; color: black;" id="jenis_mobil" type="text" class="form-control @error('jenis_mobil') is-invalid @enderror" name="jenis_mobil" value="{{ $booking->jenis_mobil }}" required autocomplete="jenis_mobil" autofocus>

                                @error('jenis_mobil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="complaint" class="col-md-2 col-form-label text-md-right">Keluhan</label>

                            <div class="col-md-6">
                                <textarea style="background-color: #ecebeb; color: black;" name="complaint" class="form-control @error('complaint') is-invalid @enderror" required="">{{ $booking->complaint }}</textarea>

                                @error('complaint')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary" style="width: 100%; font-weight: bold; font-size: 16px;">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    </div>
</div><br><br><br>
@endsection
