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
<div class="col-md-12">
    <a href="{{ url('bookingdata') }}" class="btn" style=" background:  #4D73DD; color: white;"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<div class="col-md-12">
    <div class="card mt-2">
        <div class="card-body" style="color: black;">
            @if(!empty($booking))
            <div class="col-md-12">
                <center>
                    <p style="color: #008080;"><b style="font-size: 20px;">Bengkel Mobil Delta </b><br> Jl. Bence Gang 1, Pakunden, Kec. Pesantren, Kota Kediri, Jawa Timur 64132 <br> No. HP : 0852-3577-5571
                    </p>
                </center>
                <hr>
                <h6 style="color: gray;">No. Antrian &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->no_antrian }} <br> Nama Montir  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->montir }} <br> Tanggal Servis &nbsp;: {{ $booking->service_date }} <br> Nama STNK   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->name_stnk }}</h6>
                <div class="card">
                    <div class="card-body">
                        <h4 style="color: #8B0000;" <i class="fas fa-receipt" style="color: #8B0000; font-weight:bold"></i> Data Servis</h4>
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
                    </div>
                </div>
            </div><br>
            <div class="col-md-12">
                <div class="form-group row mb-0 mt-0">
                    <div class="col-md-12 offset-md-0">
                        <a href="/addSparepart" class="btn" style=" width: 200px;font-weight: bold; font-size: 16px; background:  #1E1E2D; color: white;">
                            Suku Cadang
                        </a>
                        <a href="/addTypeService" class="btn" style=" width: 200px;font-weight: bold; font-size: 16px; background: #1E1E2D; color: white;">
                            Tipe Servis
                        </a>
                    </div>
                    @endforeach
                </div><br>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Suku Cadang/Jasa Servis</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Biaya pemasangan</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php $no = 1; ?>
                            @foreach($service_details as $service_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $service_detail->sparepart->nameS }}</td>
                                <td>{{ $service_detail->total_sparepart }} suku cadang</td>
                                <td>Rp. {{ number_format($service_detail->sparepart->price) }} </td>
                                <td>Rp. {{ number_format($service_detail->biayaPemasangan) }}</td>
                                <td>Rp. {{ number_format($service_detail->total_price) }}</td>
                            <td>
                                <form action=" {{ url('sparepartDelete') }}/{{ $service_detail->id }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data?');"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                                @foreach($detailJenis as $detailJeniss)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $detailJeniss->jenisService->name }}</td>
                                    <td></td>
                                    <td>Rp. {{ number_format($detailJeniss->jenisService->price) }}</td>
                                    <td></td>
                                    <td >Rp. {{ number_format($detailJeniss->jenisService->price) }}</td>
                                    <td>
                                        <form action="{{ url('serviceDelete') }}/{{ $detailJeniss->id }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data?');"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                    <td colspan="2" align="right"><strong>Total :</strong></td>
                                    <td ><strong>Rp. {{ number_format($booking->total_price) }}</strong></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <form method="POST" action="{{ url('InvoiceCompleted') }}/{{ $booking->id }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('POST') }}
                            <div class="form-group row mb-0 mt-0">
                                <div class="col-md-12 offset-md-0" align="right">
                                    <button type="submit" class="btn" style="  width: 500px;font-weight: bold; font-size: 16px; background:  #4D73DD; color: white;">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection