@extends('layouts.app')

@section('content')

<section class="section section-lg">
    <div class="container">
        <div class="row row-grid justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-3">Anda dapat menggunakan layanan service yang kami sediakan!</h2>
                <span class="text-sm">
                    Tidak perlu khawatir karena Bengkel Totok Jaya recommended untuk servis mesin mobil. Mulai dari
                    mengatasi overhaul, tune up dan lainnya.
                </span>
                <div class="btn-wrapper">
                    <a href="/booking" class="btn btn-warning btn-icon mt-3 mb-sm-0">
                        <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
                        <span class="btn-inner--text">BOOKING SERVICE</span>
                    </a>
                    <a href="/bookingpanggilan" class="btn btn-warning btn-icon mt-3 mb-sm-0">
                        <span class="btn-inner--icon"><i class="ni ni-delivery-fast"></i></span>
                        <span class="btn-inner--text">SERVICE DARURAT</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="item content">
    <div class="container">
    <div class="col-md-8 mx-auto text-center">
                    <!-- <span class="badge badge-primary badge-pill mb-3">Insight</span> -->
                    <h3 class="display-3">SERVICE BENGKEL MOBIL TOTOK JAYA</h3><br>
                    <!-- <p class="lead">Memperbaiki mobil Anda seharusnya mudah.</p><br> -->
                </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Service</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody style="color: #444;">
                                <?php $no = 1; ?>
                                @foreach($jenis_services as $jenis_service )
                                <tr>
                                    <td style="color: #444;">{{ $no++ }}</td>
                                    <td style="color: #444;">{{ $jenis_service->name }}</td>
                                    <td style="color: #444;">Rp. {{ number_format($jenis_service->price) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="productbox2">
                    <img src="{{ asset('argon-design-system-master') }}/assets/img/layanan.jpg" alt="" width="100%">
                    <div class="clearfix">
                    </div>
                    <br />
                    <div class="product-details text-left">
                        <p style="font-size: 20px; color: ; text-align:;"> Memilih bengkel mobil sebaiknya tidak boleh dilakukan secara asal karena akan berpengaruh pada performa kendaraan. Performa mobil yang tidak maksimal ini tentu pada akhirnya akan berpengaruh pada kenyamanan saat berkendara.
                            <!-- <a target="_blank" rel="nofollow" href="{{ url('booking') }}">Booking sekarang</a> -->
                        </p>
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
