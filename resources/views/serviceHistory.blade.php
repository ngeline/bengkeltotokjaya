@extends('layouts.app')

@section('content')
<div class="section section-hero section-shaped">
        <div class="shape shape-style-3 shape-default">
        </div>
        <div class="page-header">
            <div class="container shape-container d-flex align-items-center py-lg">
                <div class="col">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-12 text-center">
                            <h1 class="site-heading site-animate" style="font-size: 47px;">
                                <strong class="d-block" data-scrollreveal="enter top over 1.5s after 0.1s">Riwayat Service</strong>
                            </h1>

                            <h3 style="font-size: 18px; font-family: system-ui; font-weight: normal; color: white"> Anda dapat melihat riwayat service yang sudah terselesaikan pada halaman ini. </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
<section class="item content">
    <div class="container toparea1">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Layanan</th>
                                    <th>Nama Mobil</th>
                                    <th>Tanggal Servis</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($bookings as $booking)
                                <tr class="text-center">
                                    <td style="color: #444;">{{ $no++ }}</td>
                                    <td style="color: #444;">{{ $booking->status_service }}</td>
                                    <td style="color: #444;">{{ $booking->nama_mobil }}</td>
                                    <td style="color: #444;">{{ $booking->service_date }}</td>
                                    <td style="color: #444;">{{ $booking->status }}</td>
                                    <td style="color: #444;">
                                        <!-- <a href="{{ url('invoice') }}/{{ $booking->id }}" class="btn btn-primary"><i class="fa fa-info"></i> Detail </a> -->
                                        <a href="{{ url('serviceHistory') }}/{{ $booking->id }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-info"></i> Detail Riwayat
                                            Servis </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><br><br>
@endsection
@push('js')
<script>
    $('#datatable').DataTable({
        responsive: true
    });

</script>
@endpush
