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
                      <li class="breadcrumb-item active" aria-current="page">Laporan Pengeluaran</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Laporan Pengeluaran</h1> 
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
                        <form action="{{ route('laporan.pengeluaran') }}" method="GET">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <input type="month" class="form-control" id="month" name="month" required>
                                </div>
                                <div class="col-md-6">
                                    <button id="filtercari" class="btn btn-primary"><i class="fa fa-filter"></i> Filter </button>
                                    <a href="{{route('laporan.pengeluaran')}}" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh </a>
                                </div>
                            </form>
                            <div class="col-6 mt-3">
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
                                        <th>Nama</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @forelse ($spareparts as $sparepart)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $sparepart->sparepartName }}</td>
                                        <td><span class="text-white bg-danger badge"><i class="fa fa-minus"></i> {{ $sparepart->total_spareparts }}</span></td>
                                    </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="3">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div style="float: right">
                {{ $spareparts->links('vendor.pagination.bootstrap-4') }}
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
});
</script>

@endsection