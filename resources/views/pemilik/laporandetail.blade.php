@extends('layouts.pemilik')

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
                        <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Basic Table</h1>
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
                <a href="{{ url('laporanservice') }}" class="btn" style=" background:  #4D73DD; color: white;"><i
                        class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-body" style="color: black;">
                        @if(!empty($booking))
                        <p style="color: #008080">Status booking {{ $booking->status }} / A.n {{ $booking->name_stnk }}
                        </p>
                        <p>No. Booking : {{ $booking->no_antrian }} / Tanggal Booking : {{ $booking->service_date }}</p>
                        <br>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 style="color: #8B0000;"><i class="fas fa-history" style="color: #8B0000;"></i>
                                        Detail Pemesanan</h4>
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
                                    <h4 style="color: #8B0000;"><i class="fas fa-user" style="color: #8B0000;"></i></h4>
                                    <table class="table">
                                        <tbody>
                                            @foreach($bookings as $booking)
                                            <tr>
                                                <td>Nama Montir</td>
                                                <td>:</td>
                                                <td>{{ $booking->montir }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection
