<!DOCTYPE html>
<html>

<head>
    <title>Bengkel Mobil Delta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    @if(!empty($booking))
    <center>
        <p style="color: #008080;"><b style="font-size: 24px;">Bengkel Mobil Delta </b><br> Jl. Bence Gang 1, Pakunden, Kec. Pesantren, Kota Kediri, Jawa Timur 64132 <br> No. HP : 0852-3577-5571
        </p>
    </center>
    <hr style="color: gray;">
    <h6 style="color: gray;">No. Antrian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->no_antrian }} <br> Nama Montir  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->montir }} <br> Tanggal Servis &nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->service_date }} <br> Nama STNK   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $booking->name_stnk }}</h6>
    <h4 style="color:  #1a9bfc;"> Invoice</h4>
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
    @endforeach
    <div style="color: #1a9bfc; font-weight:bold; font-size: 16px">
                        Datail Suku Cadang dan Tipe Servis
                        </div><br>
                        <table class="table table-striped">
                            <thead>
                                <tr style=" color: gray;">
                                    <th >No.</th>
                                    <th >Suku Cadang/Jasa Servis</th>
                                    <th >Qty</th>
                                    <th >Harga</th>
                                    <th >Biaya pemasangan</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($service_details as $service_detail)
                                <tr style=" color: gray;">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $service_detail->sparepart->nameS }}</td>
                                    <td>{{ $service_detail->total_sparepart }}</td>
                                    <td>Rp. {{ number_format($service_detail->sparepart->price) }} </td>
                                    <td>Rp. {{ number_format($service_detail->biayaPemasangan) }}</td>
                                    <td>Rp. {{ number_format($service_detail->total_price) }}</td>
                                </tr>
                                @endforeach
                                @foreach($detailJenis as $detailJeniss)
                                <tr style=" color: gray;">
                                    <td >{{ $no++ }}</td>
                                    <td>{{ $detailJeniss->jenisService->name }}</td>
                                    <td></td>
                                    <td>Rp. {{ number_format($detailJeniss->jenisService->price) }}</td>
                                    <td></td>
                                    <td >Rp. {{ number_format($detailJeniss->jenisService->price) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                
                                    <td colspan="4" class="text-right"><strong>Total :</strong></td>
                                    <td colspan = "2" class="text-right"><strong>Rp. {{ number_format($booking->total_price) }}</strong></td>
                                    
                                </tr>
                            </tbody>
                        </table><br>
    @endif
    <h3 style="font-size: 16px; text-align: center; color: gray;"><b>Hormat Kami,</b></h3>
    <br><br><br>
    <h4 style="font-size: 14px; text-align: center; color: gray;">Admin Bengkel Delta</h4>
</body>

</html>