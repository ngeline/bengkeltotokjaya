@extends('layouts.pemilik')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <!-- <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                      <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                      <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Basic Table</h1>
            </div> -->

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
                        <div class="col-md-12">
                            <center>
                                <p style="color: #008080;"><b style="font-size: 20px;">Bengkel Mobil Totok Jaya </b><br> 868F+FJ9, Jalan Raya, Jombok, Ngoro, Jombang Regency, East Java 61473 <br> No. HP :
                                    0811-3513-3171
                                </p>
                            </center>
                            <hr>
                            <h6 style="color: gray;">No. Antrian &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;:
                                {{ $booking->no_antrian }} <br> Nama Montir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                {{ $booking->montir }} <br> Tanggal Servis &nbsp;: {{ $booking->service_date }} <br>
                                Nama STNK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->name_stnk }}</h6>
                            <div class="card">
                                <div class="card-body">
                                    <h4 style="color: #8B0000;" <i class="fas fa-receipt" style="color: #8B0000;"></i>
                                        Data Servis</h4>
                                    <table class="table">
                                        <tbody>
                                            @foreach($bookings as $booking)
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
                                        </tbody>
                                    </table>
                                    <div style="color: #8B0000; font-weight:bold; font-size: 16px">

                                        @endforeach
                                        <div style="color: #8B0000; font-weight:bold; font-size: 16px">
                                            Datail Suku Cadang dan Tipe Servis
                                        </div><br>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Suku Cadang/Jasa Servis</th>
                                                    <th>Qty</th>
                                                    <th>Harga</th>
                                                    <th>Biaya pemasangan</th>
                                                    <th>Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach($service_details as $service_detail)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $service_detail->sparepart->nameS }}</td>
                                                    <td>{{ $service_detail->total_sparepart }}</td>
                                                    <td>Rp. {{ number_format($service_detail->sparepart->price) }} </td>
                                                    <td>Rp. {{ number_format($service_detail->biayaPemasangan) }}</td>
                                                    <td>Rp. {{ number_format($service_detail->total_price) }}</td>
                                                </tr>
                                                @endforeach
                                                @foreach($detailJenis as $detailJeniss)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $detailJeniss->jenisService->name }}</td>
                                                    <td></td>
                                                    <td>Rp. {{ number_format($detailJeniss->jenisService->price) }}</td>
                                                    <td></td>
                                                    <td>Rp. {{ number_format($detailJeniss->jenisService->price) }}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2" align="right"><strong>Total :</strong></td>
                                                    <td><strong>Rp. {{ number_format($booking->total_price) }}</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table><br>
                                        @endif
                                        <h3 style="font-size: 16px; text-align: center; color: gray;"><b>Hormat
                                                Kami,</b></h3>
                                        <br><br><br><br>
                                        <h4 style="font-size: 14px; text-align: center; color: gray;">Admin Bengkel
                                        Totok Jaya </h4>
                                    </div>
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
