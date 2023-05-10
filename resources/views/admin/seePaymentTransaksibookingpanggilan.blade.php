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
                      <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Basic Table</h1> 
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
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('laporantransaksiadmin') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h3 style="color: gray;"><i class="far fa-money-bill-alt"></i> Lihat Pembayaran</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr style="color: gray;">
                                <th>Nama Rekening</th>
                                <th>Tanggal</th>
                                <th>Bank</th>
                                <th>Pembayaran</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr style="color: gray;">
                                    <td>{{ $payments->namaRek }}</td>
                                    <td>{{ $payments->order_date }}</td>
                                    <td>{{ $payments->bank }}</td>
                                    <td>{{ $payments->pembayaran }}</td>
                                    <td>Rp. {{ number_format($payments->total) }}</td>
                                </tr>
                        </tbody>
                    </table>
                    @if ($payments->buktiPayment)
                    <img src="{{ url('images/bukti') }}/{{ $payments->buktiPayment }}" width="300" alt="...">
                    @endif
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
</div>
@endsection