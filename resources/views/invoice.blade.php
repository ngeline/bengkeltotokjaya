@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="col-md-12">
    <a href="{{ url('history') }}" class="btn" style=" background:  #8B0000; color: white;"><i class="fa fa-arrow-left"></i> Kembali</a>
    @if(!empty($booking))
    <a href="{{ url('invoice/print') }}/{{ $booking->id }}" class="btn" style=" background:  #8B0000; color: white;" target="_blank"><i class="fas fa-print"></i> Print PDF</a>
</div>
<div class="col-md-12">
    <div class="card mt-2">
        <div class="card-body" style="color: black;">
            <div class="col-md-12">
                <center>
                    <p style="color: #008080;"><b style="font-size: 20px;">Bengkel Mobil Delta </b><br> Jl. Bence Gang 1, Pakunden, Kec. Pesantren, Kota Kediri, Jawa Timur 64132 <br> No. HP : 0852-3577-5571
                    </p>
                </center>
                <hr>
                <h6 style="color: gray;">No. Antrian  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->no_antrian }} <br> Nama Montir  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->montir }} <br> Tanggal Servis  &nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->service_date }} <br> Nama STNK    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->name_stnk }}</h6>
                <div class="card">
                    <div class="card-body">
                        <h4 style="color: #1a9bfc;" <i class="fas fa-receipt" style="color: #1a9bfc;"></i> Invoice</h4>
                        <table class="table">
                            <tbody style="color: gray;">
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
                                    <td>Nomor Plat</td>
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
                        @endforeach
                        <div style="color: #1a9bfc; font-weight:bold; font-size: 16px">
                        Datail Suku Cadang dan Tipe Servis
                        </div><br>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Suku Cadang/Jasa Servis</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Biaya Pemasangan</th>
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
                                    <td >Rp. {{ number_format($detailJeniss->jenisService->price) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                    <td colspan="2" align="right"><strong>Total :</strong></td>
                                    <td ><strong>Rp. {{ number_format($booking->total_price) }}</strong></td>
                                </tr>
                            </tbody>
                        </table><br>
                        @endif
                        <h3 style="font-size: 16px; text-align: center; color: gray;"><b>Hormat Kami,</b></h3>
                        <br><br><br><br>
                        <h4 style="font-size: 14px; text-align: center; color: gray;">Admin Bengkel Delta</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection