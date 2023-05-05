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
                        <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                    class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking Panggilan detail</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Booking Panggilan detail</h1>
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
            <div class="col-md-12">
                <a href="{{ url('bookingpanggilan') }}" class="btn" style=" background:  #4D73DD; color: white;"><i
                        class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-body" style="color: black;">
                        @if(!empty($booking))
                        <p style="color: #008080">Status Pemesanan {{ $booking->status }} / A.n
                            {{ $booking->name_stnk }} </p>
                        <p>No. Antrian : {{ $booking->no_antrian }} / Tanggal Pemesanan : {{ $booking->service_date }}
                        </p><br>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 style="color: #1a9bfc;"><i class="fas fa-history"
                                            style="color: #1a9bfc;"></i>Detail Pemesanan</h4>
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
                                                <td>Nomor Plat Mobil</td>
                                                <td>:</td>
                                                <td>{{ $booking->number_plat }}</td>
                                            </tr>
                                            <tr>
                                                <td>Service</td>
                                                <td>:</td>
                                                <td>{{ $booking->service_id }}</td>
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST"
                                        action="{{ url('bookingpanggilan/detail/input_queue') }}/{{ $booking->id }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="no_antrian" class="col-md-5 col-form-label"
                                                style="color: #1a9bfc;">Nomor antiran</label>

                                            <div class="col-md-7">
                                                <input placeholder="Masukkan nomor antrian..."
                                                    style="background-color: #ecebeb; color: gray;" id="queue"
                                                    type="text" value="{{ $booking->no_antrian }}"
                                                    class="form-control @error('no_antrian') is-invalid @enderror"
                                                    readonly name="no_antrian">

                                                @error('no_antrian')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- <div class="form-group row">
                                <label for="montir" class="col-md-5 col-form-label" style="color: #1a9bfc;">Nama Montir</label>

                                <div class="col-md-7">
                                    <input placeholder="Masukkan nama montir..." style="background-color: #ecebeb; color: gray;" id="montir" type="text" value="{{ $booking->montir }}" class="form-control @error('montir') is-invalid @enderror" readonly name="montir" required>

                                    @error('montir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> -->

                                        <div class="form-group row">
                                            <label for="montir" class="col-md-5 col-form-label"
                                                style="color: #1a9bfc;">Nama Montir</label>
                                            <div class="col-md-7">
                                                <select
                                                    style="width: 100%;  padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;  resize: vertical; color: gray;"
                                                    id="montir" type="text" name="montir" required>
                                                    <option value="{{ $booking->montir }}">{{ $booking->montir }}
                                                    </option>
                                                    @foreach($datamt as $mt)
                                                    <option value="{{ $mt->name }}">{{ $mt->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="status" class="col-md-5 col-form-label"
                                                style="color: #1a9bfc;">Status</label>

                                            <div class="col-md-7">
                                                <select
                                                    style="width: 100%;  padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;  resize: vertical; color: gray;"
                                                    name="status" required>
                                                    <option hidden value="Servis diproses">{{ $booking->status }}
                                                    </option>
                                                    <option value="Servis diproses">Servis diproses</option>
                                                    <option value="Servis selesai">Servis selesai</option>
                                                    <!-- <option value="Payment confirmed">Pembayaran dikonfirmasi</option> -->
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row mb-0 mt-0">
                                            <div class="col-md-12 offset-md-0" align="right">
                                                <button type="submit" class="btn"
                                                    style=" width: 100px;font-weight: bold; font-size: 16px; background:  #4D73DD; color: white;">
                                                    Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
