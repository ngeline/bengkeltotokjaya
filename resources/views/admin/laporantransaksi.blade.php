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
                      <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Laporan</h1> 
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
                        <form action="{{ route('acari') }}" method="GET">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <input type="date" class="form-control" id="tgl_awal" name="start_date" value="{{
                                        isset($_GET['start_date']) ? $_GET['start_date'] : ''}}" required>
                                </div>
                                <div class="col-md-1">
                                        <p class="mt-2">Sampai</p>
                                    </div>
                                    <div class="col-md-2">
                                    <input type="date" class="form-control" id="tgl_akhir" name="end_date" value="{{
                                        isset($_GET['end_date']) ? $_GET['end_date'] : ''}}" required>
                                </div>
                                <div class="col-md-6">
                                    <button id="filtercari" class="btn btn-primary"><i class="fa fa-filter"></i> Filter </button>
                                    <a href="/laporantransaksiadmin" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh </a>
                                </div>
                            

                            <!-- <div class="row mb-3">
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
                                        <a href="/bookingdata" class="btn btn-primary"><i class="fa fa-refresh"></i>
                                            Refresh </a>
                                        <a href="tambahbookingservice" class="btn btn-primary"><i class="fa fa-plus"
                                                type="button"></i> Tambah Servis</a>
                                    </div>
                                </div> -->
                            </form>
                            <div class="col-6">
                            <!-- isset() untuk mengecek apakah variable tersebut ada atau tidak -->
                            <!-- jika $start_date dan $end_date tidak ada maka parameter semua data -->
                            <!-- <a  href="create-pdf-file/{{isset($start_date) ? $start_date : 'semua'}}/{{isset($end_date) ? $end_date : 'semua'}}" class="btn btn-info" type="button">Export PDF</a> -->
                            <a  href="exportexcel/{{isset($start_date) ? $start_date : 'semua'}}/{{isset($end_date) ? $end_date : 'semua'}}" class="btn btn-info" type="button">Export Excel</a>
                          </div>
                    </div>
                        
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Mobil</th>
                                        <th>Plat Mobil</th>
                                        <th>Tanggal</th>
                                        <th>Total Transaksi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $service->user->name }}</td>
                                        <td>{{ $service->nama_mobil }}</td>
                                        <td>{{ $service->number_plat }}</td>
                                        <td>{{ $service->service_date }}</td>
                                        <?php 
                                        $total_spareparts = 0;
                                        foreach($service->detail_services as $item) {
                                            $total_spareparts += $item->total_price;
                                        } 
                                        $total_spareparts += $service->total_price?>
                                        <td>Rp. {{ number_format($total_spareparts, 0, ',', '.') }}</td>
                                        <td>
                                            @if($service->status == 'Menunggu diproses' || $service->status == 'Servis diproses' || $service->status == 'Queue available')
                                            @elseif($service->status == 'Servis Pembayaran')
                                            @elseif($service->status == 'Menunggu pembayaran')
                                            @elseif($service->status == 'Sudah mengirim pembayaran'||  $service->status == 'Menunggu pembayaran' ||  $service->status == 'Pembayaran diverifikasi')
                                            <a href="{{ url('seePaymentTransaksi') }}/{{ $service->id }}" class="btn" style="background: #008000; color: white;"><i class="fa fa-info"></i> Bukti Pembayaran</a>
                                            <a href="{{ url('bookingdata/invoiceDone') }}/{{ $service->id }}" class="btn" style="background: #4D73DD; color: white;"><i class="fa fa-info"></i> Data Servis</a>
                                            
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

<script>
$(document).ready(function(){
    $('.input-datepicker').datepicker({
        todayBtn:'linked',
        format:'yyyy-mm-dd',
        autoclose:true
    });
    
    load_data;
    
    function load_data(from_date = '', to_date = '')
    {
        $(#order_table).DataTable({
           processing: true,
           serverSide: true,
           ajax: {
               url:'{{ route("acari") }}',
               data:{from_date:from_date, to_date:to_date}
           }
           columns: [
               {
                 data:'user_id'
                 name:'user_id'
               },
               {
                 data:'nama_mobil'
                 name:'nama_mobil'
               },
               {
                 data:'number_plat'
                 name:'number_plat'
               },
               {
                 data:'service_date'
                 name:'service_date'
               }
           ]
        })
    }

    $('button#filtercari').click(function(e){
        e.preventDefault();
        var from_date = $('#tgl_awal').val();
        var to_date = $('#tgl_akhir').val();
        console.log(from_date);
        if(from_date != '' && to_date != '')
        {
            $('#order_table').DataTable().destroy();
            load_data(from_date, to_date);
        }
        else
        {
            alert('Both Date is required');
        }
    });

    $('#refresh').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $('#order_table').DataTable().destroy();
        load_data();
    })
});
</script>

@endsection