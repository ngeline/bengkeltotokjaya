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
                        <a href="{{ url('laporantransaksi') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h3 style="color: gray;"><i class="far fa-money-bill-alt"></i> Lihat Pembayaran</h3>
                                <table class="table table-striped">
                                    <thead>
                                        <tr style="color: gray;">
                                            <th>Name Akun</th>
                                            <th>Tanggal</th>
                                            <th>Bank</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments as $payment)
                                        <tr style="color: gray;">
                                            <td>{{ $payment->namaRek }}</td>
                                            <td>{{ $payment->order_date }}</td>
                                            <td>{{ $payment->bank }}</td>
                                            <td>Rp. {{ number_format($payment->total) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <img src="{{ url('images/bukti') }}/{{ $payment->buktiPayment }}" width="400" alt="...">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
