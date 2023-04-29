@extends('layouts.admin')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <!-- <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                    class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Basic Table</h1>
            </div> -->

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
            <section class="item content mb-5">
                <div class="container toparea1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                        <h6 class="m-0 font-weight-bold" style="color: 	#1E1E2D;">Data Suku Cadang</h6>

                                    <div class="card-body">
                                        <form action="{{ route('addscari') }}" method="GET">
                                            <div class="row mb-3">
                                                <div class="col-3">
                                                    <input type="search" class="form-control float-right"
                                                        placeholder="Cari" id="cari" name="cari">
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-primary" type="submit"><i
                                                            class="fa fa-search" aria-hidden="true"></i> Search</button>
                                                    <a href="/addSparepart" class="btn btn-primary"><i
                                                            class="fa fa-refresh"></i> Refresh </a>
                                                </div>
                                        </form>
                                    </div>

                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Merek Mobil</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Biaya Pemasangan</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($spareparts as $sparepart)
                                            <tr class="text-center">
                                                <td style="color: #444;">{{ $no++ }}</td>
                                                <td style="color: #444;">{{ $sparepart->name }}</td>
                                                <td style="color: #444;">{{ $sparepart->nameS }}</td>
                                                <td style="color: #444;">Rp. {{ number_format($sparepart->price) }}
                                                    @if($sparepart->stock != null)
                                                    <span class="badge badge-success"> <i class="fas fa-check"></i>
                                                        Ready Stock</span>
                                                    @else
                                                    <span class="badge badge-danger"> <i class="fas fa-times"></i> Out
                                                        of Stock</span>
                                                    @endif
                                                </td>
                                                <td style="color: #444;">Rp.
                                                    {{ number_format($sparepart->biayaPemasangan) }}</td>
                                                <td style="color: #444;">{{ $sparepart->stock }} pcs</td>
                                                <td>
                                                    <form method="post"
                                                        action="{{ url('/sparepart/need') }}/{{ $sparepart->id }}/{{ $id_service }}">
                                                        <input type="text" name="total_sparepart" class="form-control"
                                                            required="" style="background-color: white; width: 100px;">
                                                        @csrf
                                                        <button type="submit" class="btn" align="left"
                                                            style="background: #8B0000; color: white;"
                                                            @if($sparepart->stock == 0) disabled @endif><i
                                                                class="fas fa-shopping-cart"></i> Tambah</button>
                                                    </form>
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
            </section>
        </div>
    </div>
    @endsection
