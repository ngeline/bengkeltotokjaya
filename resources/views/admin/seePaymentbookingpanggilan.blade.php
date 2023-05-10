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
                        <a href="{{ url('bookingdata') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>
                            Kembali</a>
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
                                <img src="{{ url('images/bukti') }}/{{ $payments->buktiPayment }}" width="300"
                                    alt="...">
                                @endif
                            </div>


                            <form method="POST" action="{{ route('seePayment.update', $booking->id) }}">
                                @csrf
                                <div class="card-body row">
                                    <h3 style="color: gray;"><i for="status" class="col-md-6 col-form-labelt"
                                            style="color: #8B0000;"></i>Status</h3>
                                    <div class="col-md-7">
                                        <select
                                            style="width: 100%;  padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;  resize: vertical; color: gray;"
                                            id="status" name="status">
                                            <option value="">Pilih status</option>
                                            <option value="Menunggu Pembayaran">Pembayaran ditolak</option>
                                            <option value="Sudah mengirim pembayaran">Pembayaran diverifikasi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="card-body row mb-0 mt-0">
                                    <div class="col-md-12 offset-md-0" align="right">
                                        <button type="submit" class="btn"
                                            style=" width: 100px;font-weight: bold; font-size: 16px; background:  #4D73DD; color: white;">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
