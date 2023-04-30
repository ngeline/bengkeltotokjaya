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
                        <li class="breadcrumb-item active" aria-current="page">Laporan Servis</li>
                    </ol>
                </nav>
                <!-- <h1 class="mb-0 fw-bold">Laporan Servis</h1> -->
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
            <div class="col-lg-12">
                <div class="card  shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold" style="color: 	#1E1E2D;">Laporan Data Servis</h6>
                    </div>


                    <div class="card-body">
                        <form action="{{ route('carilapser') }}" method="GET">
                            <div class="row mb-3">
                                <div class="col-3">
                                    <input type="search" class="form-control float-right" placeholder="Cari" id="cari"
                                        name="cari">
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"
                                            aria-hidden="true"></i> Cari</button>
                                    <a href="/laporanservice" class="btn btn-primary"><i class="fa fa-refresh"></i>
                                        Refresh </a>
                                </div>
                        </form>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table style="color: #708090;" class="table table-bordered table-striped yajra-datatable"
                            id="data_users_side" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Layanan Service</th>
                                    <th>Antrian</th>
                                    <th>Mobil</th>
                                    <th>Montir</th>
                                    <th>Tanggal</th>
                                    <th>Status Booking</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($services as $service)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->status_service }}</td>
                                    <td>{{ $service->no_antrian }}</td>
                                    <td>{{ $service->nama_mobil }}</td>
                                    <td>{{ $service->montir }}</td>
                                    <td>{{ $service->service_date }}</td>
                                    <td>
                                        {{ $service->status }}
                                        <br>
                                        @if($service->queue != null)
                                    </td>
                                    @endif
                                    <td>
                                        @if($service->status == 'Menunggu diproses' || $service->status == 'Servis
                                        diproses' || $service->status == 'Queue available')
                                        <a href="{{ url('laporanservice/detail') }}/{{ $service->id }}" class="btn"
                                            style="background: #8B0000; color: white;"><i class="fa fa-info"></i>
                                            Detail</a>
                                        @elseif($service->status == 'Servis selesai')
                                        <a href="{{ url('laporanservice/invoice') }}/{{ $service->id }}" class="btn"
                                            style="background: #FF7F00; color: white;"><i class="fa fa-info"></i> Lihat
                                            Invoice</a>
                                        @elseif($service->status == 'Menunggu pembayaran')
                                        <a href="{{ url('laporanservice/invoiceDone') }}/{{ $service->id }}" class="btn"
                                            style="background: #4D73DD; color: white;"><i class="fa fa-info"></i> Data
                                            Servis</a>
                                        @elseif($service->status == 'Sudah mengirim pembayaran'|| $service->status ==
                                        'Menunggu pembayaran' || $service->status == 'Pembayaran diverifikasi')
                                        <a href="{{ url('laporanservice/invoiceDone') }}/{{ $service->id }}" class="btn"
                                            style="background: #4D73DD; color: white;"><i class="fa fa-info"></i> Data
                                            Servis</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="float: right">
                        {{ $services->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- <div class="col-md-3">
        <form action="" method="POST">
        @csrf
        <div class="form-group">
            <div class="input-group">
              <input type="search" class="form-control" placeholder="Nama Produk" name="cari">
              <div class="input-group-append">
                <button class="btn btn-sm btn-primary" type="submit">Search</button>
              </div>
            </div>
        </div>
    </form>
</div> -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
@endsection
