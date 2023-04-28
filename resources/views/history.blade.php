@extends('layouts.app')

@section('content')
    <div class="section section-hero section-shaped"
        style="background-image: url({{ asset('images/mobil.jpg') }}); width: 100%">
        <div class="shape shape-style-3 shape-default">
        </div>
        <div class="page-header">
            <div class="container shape-container d-flex align-items-center py-lg">
                <div class="col">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-12 text-center">
                            <h1 class="site-heading site-animate" style="font-size: 47px;">
                                <strong class="d-block" data-scrollreveal="enter top over 1.5s after 0.1s">Status
                                    Service</strong>
                            </h1>

                            <h3 style="font-size: 18px; font-family: system-ui; font-weight: normal; color: white"> Anda
                                dapat melihat status service mobil anda pada halaman ini. </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                        <th>Nama Mobil</th>
                                        <th>Nomor Antrian</th>
                                        <th>Tanggal Servis</th>
                                        <th>Status</th>
                                        @if ($ket != '')
                                            <th>Keterangan</th>
                                        @endif
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="color: #444;">
                                    <?php $no = 1; ?>
                                    @foreach ($bookings as $booking)
                                        <tr class="text-center">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $booking->nama_mobil }}</td>
                                            <td>No : {{ $booking->no_antrian }}</td>
                                            <td>{{ $booking->service_date }}</td>
                                            <td>
                                                {{ $booking->status }}
                                                <br>
                                                @if ($booking->queue != null)
                                                @endif
                                            </td>
                                            @if ($ket != '')
                                                <td>{{ $booking->keterangan }}</td>
                                            @endif
                                            <td>
                                                @if (
                                                    $booking->status == 'Menunggu diproses' ||
                                                        $booking->status == 'Servis diproses' ||
                                                        $booking->status == 'Queue available')
                                                    <a href="{{ url('history') }}/{{ $booking->id }}"
                                                        class="btn btn-primary btn-sm mt-1 ms-1"><i class="fa fa-info"></i>
                                                        Detail Booking</a>
                                                @elseif($booking->status == 'Servis selesai' || $booking->status == 'Menunggu pembayaran')
                                                    <a href="{{ url('invoice') }}/{{ $booking->id }}"
                                                        class="btn btn-primary btn-sm mt-1 ms-1"><i class="fa fa-info"></i>
                                                        Data Servis</a>
                                                    <a href="{{ url('payment') }}/{{ $booking->id }}"
                                                        class="btn btn-primary btn-sm mt-1 ms-1"><i class="fa fa-info"></i>
                                                        Kirim Pembayaran</a>
                                                @elseif($booking->status == 'Sudah mengirim pembayaran' || $booking->status == 'Pembayaran diverifikasi')
                                                    <a href="{{ url('invoice') }}/{{ $booking->id }}"
                                                        class="btn btn-primary btn-sm mt-1 ms-1"><i class="fa fa-info"></i>
                                                        Data Servis</a>
                                                    <a href="{{ url('history/seePayment') }}/{{ $booking->id }}"
                                                        class="btn btn-primary btn-sm mt-1 ms-1"><i class="fa fa-info"></i>
                                                        Bukti Pembayaran</a>
                                                @endif
                                                <div class="btn-group">
                                                </div>
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
