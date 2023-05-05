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
                        <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                    class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking Panggilan</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Booking Panggilan</h1>
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
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <form action="{{ route('abpcari') }}" method="GET">
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
                                            Filter </button>
                                        <a href="/bookingpanggilanadmin" class="btn btn-primary"><i
                                                class="fa fa-refresh"></i>
                                            Refresh </a>
                                    </div>
                                </div>
                            </form>
                            <div class="card-body table-responsive p-0 mt-5">
                                <table class="table table-striped table-hover yajra-datatable" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Akun</th>
                                            <th>Nomor Antrian</th>
                                            <th>Nama Montir</th>
                                            <th>Tanggal</th>
                                            <th>Status Pemesanan</th>
                                            <th>Foto</th>
                                            <th>Maps</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->no_antrian }}</td>
                                            <td>{{ $service->montir }}</td>
                                            <td>{{ $service->service_date }}</td>
                                            <td>
                                                {{ $service->status }}
                                                <br>
                                                @if($service->queue != null)
                                            </td>
                                            @endif
                                            <td>
                                                @include('admin.modaldokumen')
                                                <button type="button" class="btn btn-primary"
                                                    onclick="dokumenModal({{ $service->id }})">
                                                    Tampilkan
                                                </button>
                                            </td>
                                            <td>
                                                <a href="{{'https://maps.google.com/maps/search'}}/{{ $service->maps }}"
                                                    target="_blank" class="btn"
                                                    style="background: #4D73DD; color: white;"><i class="fa fa-map"></i>
                                                    Maps</a>
                                            </td>
                                            <td>
                                                @if($service->status == 'Menunggu diproses' || $service->status ==
                                                'Servis diproses' || $service->status == 'Queue available')
                                                <a href="{{ url('bookingpanggilanadmin/detail') }}/{{ $service->id }}" class="btn"
                                                    style="background: #8B0000; color: white;"><i
                                                        class="fa fa-info"></i> Detail</a>
                                                <a href="{{ url('bookingdata/edit') }}/{{ $service->id }}"
                                                    class="btn btn-warning"
                                                    style="background: #FF7000; color: white;"><i
                                                        class="fa fa-edit"></i>Ubah </a>
                                                <a href="{{ route('bookingdata.destroy', $service->id) }}"
                                                    onclick="return confirm('Apakah anda ingin menghapus data servis?')"
                                                    class="btn btn-warning"
                                                    style="background: #D50600; color: white;"><i
                                                        class="fa fa-trash"></i> Hapus</a>
                                                @elseif($service->status == 'Servis selesai')
                                                <a href="{{ url('bookingdata/invoice') }}/{{ $service->id }}"
                                                    class="btn" style="background: #FF7F00; color: white;"><i
                                                        class="fa fa-info"></i> Kelola Pembayaran</a>
                                                @elseif($service->status == 'Menunggu pembayaran')
                                                <a href="{{ url('bookingdata/invoiceDone') }}/{{ $service->id }}"
                                                    class="btn" style="background: #4D73DD; color: white;"><i
                                                        class="fa fa-clipboard"></i> Data Servis</a>
                                                <a href="{{ route('bookingdata.update', $service->id) }}" class="btn"
                                                    onclick="return confirm('Ingin melakukan pembayaran langsung?')"
                                                    style="background: #008000; color: white;"><i class="fa fa-usd"></i>
                                                    Bayar Langsung</a>
                                                @elseif($service->status == 'Sudah mengirim pembayaran'||
                                                $service->status == 'Menunggu pembayaran' || $service->status ==
                                                'Pembayaran diverifikasi')
                                                <a href="{{ url('seePayment') }}/{{ $service->id }}" class="btn"
                                                    style="background: #008000; color: white;"><i
                                                        class="fa fa-info"></i> Bukti Pembayaran</a>
                                                <a href="{{ url('bookingdata/invoiceDone') }}/{{ $service->id }}"
                                                    class="btn" style="background: #4D73DD; color: white;"><i
                                                        class="fa fa-clipboard"></i> Data Servis</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div style="float: right">
                        {{ $services->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.js"></script>

        <script type="text/javascript">
            $(function () {

                var table = $('.yajra-datatable').DataTable({});
            });
            @endsection

        </script>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            $('#tabel-data-masuk').DataTable({
                responsive: true
            });

            $('#tabel-data-keluar').DataTable({
                responsive: true
            });

            $('#buttonexampleModal').click(function() {
                $('#exampleModal').modal('toggle')
            });

            $('#buttoncloseexampleModal').click(function() {
                $('#exampleModal').modal('hide')
            });

            $('#btnCloseEdit').click(function() {
                $('#exampleModal').modal('hide')
            });
        });

        function editModal(id) {
            $('#modal-edit' + id).modal('toggle');
        }

        function dokumenModal(id) {
            $('#modal-dokumen' + id).modal('toggle');
        }
    </script>
@endpush