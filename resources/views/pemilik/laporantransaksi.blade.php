<!-- <?php //dd($services)?> -->
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
                        <li class="breadcrumb-item active" aria-current="page">Laporan Transaksi</li>
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
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold" style="color: 	#1E1E2D;">Laporan Data Transaksi</h6>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('carilaptran') }}" method="GET">
                            <div class="row mb-3">
                                <div class="col-3">
                                    <input type="search" class="form-control float-right" placeholder="Cari" id="cari"
                                        name="cari">
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"
                                            aria-hidden="true"></i> Cari</button>
                                    <!-- <a href="/laporanservice" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh </a> -->
                                </div>
                        </form>

                        <div class="card-body">
                            <form action="{{ route('pcari') }}" method="GET">
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" id="tgl_awal" name="start_date"
                                            required>
                                    </div>
                                    <div class="col-md-1">
                                        <p class="mt-2">Sampai</p>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" id="tgl_akhir" name="end_date" required>
                                    </div>
                                    <div class="col-md-6">
                                        <button id="filtercari" class="btn btn-primary"><i class="fa fa-filter"></i>
                                            Filter
                                        </button>
                                        <a href="/laporantransaksi" class="btn btn-primary"><i
                                                class="fa fa-refresh"></i>
                                            Refresh </a>
                                    </div>
                            </form>
                            <div class="col-6">
                                <!-- isset() untuk mengecek apakah variable tersebut ada atau tidak -->
                                <!-- jika $start_date dan $end_date tidak ada maka parameter semua data -->
                                <!-- <a  href="create-pdf-file/{{isset($start_date) ? $start_date : 'semua'}}/{{isset($end_date) ? $end_date : 'semua'}}" class="btn btn-info" type="button">Export PDF</a> -->
                                <a href="exportexcelpemilik/{{isset($start_date) ? $start_date : 'semua'}}/{{isset($end_date) ? $end_date : 'semua'}}"
                                    class="btn btn-info" type="button">Export Excel</a>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Akun</th>
                                        <th>Nama STNK</th>
                                        <th>Layanan Service</th>
                                        <th>Antrian</th>
                                        <th>Montir</th>
                                        <th>Mobil</th>
                                        <th>Merek Mobil</th>
                                        <th>Plat Mobil</th>
                                        <th>Tanggal</th>
                                        <th>Keluhan</th>
                                        <th>Total Transaksi</th>

                                        <!-- <th>Bukti Pembayaran</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->name_stnk }}</td>
                                        <td>{{ $service->status_service }}</td>
                                        <td>{{ $service->no_antrian }}</td>
                                        <td>{{ $service->montir }}</td>
                                        <td>{{ $service->nama_mobil }}</td>
                                        <td>{{ $service->jenis_mobil }}</td>
                                        <td>{{ $service->number_plat }}</td>
                                        <td>{{ $service->service_date }}</td>
                                        <td>{{ $service->complaint }}</td>
                                        <td>{{ $service->total_price }}</td>
                                        <td>
                                            @if($service->status == 'Menunggu diproses' || $service->status == 'Servis
                                            diproses' || $service->status == 'Queue available')
                                            @elseif($service->status == 'Servis selesai')
                                            @elseif($service->status == 'Menunggu pembayaran')
                                            @elseif($service->status == 'Sudah mengirim pembayaran'|| $service->status
                                            ==
                                            'Menunggu pembayaran')
                                            <!-- <a href="{{ url('laporantransaksi/seePayment') }}/{{ $service->id }}" class="btn" style="background: #008000; color: white;"><i class="fa fa-info"></i> Bukti Pembayaran</a> -->
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div style="float: right">
                            {{ $services->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('.input-datepicker').datepicker({
            todayBtn: 'linked',
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        load_data;

        function load_data(from_date = '', to_date = '') {
            $(#order_table).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("daterange.index") }}',
                    data: {
                        from_date: from_date,
                        to_date: to_date
                    }
                }
                columns: [{
                        data: 'user_id'
                        name: 'user_id'
                    },
                    {
                        data: 'nama_mobil'
                        name: 'nama_mobil'
                    },
                    {
                        data: 'number_plat'
                        name: 'number_plat'
                    },
                    {
                        data: 'service_date'
                        name: 'service_date'
                    }
                ]
            })
        }

        $('#filter').click(function () {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if (from_date != '' && to_date != '') {
                $('#order_table').DataTable().destroy();
                load_data(from_date, to_date);
            } else {
                alert('Both Date is required');
            }
        });

        $('#refresh').click(function () {
            $('#from_date').val('');
            $('#to_date').val('');
            $('#order_table').DataTable().destroy();
            load_data();
        })
    });

</script>

@endsection
