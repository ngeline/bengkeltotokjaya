@extends('layouts.app')

@section('content')
<div class="container py-4">
<br><br><br>
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Beranda</a></li>
                    <li class="breadcrumb-item active text-dark" aria-current="page" >Daftar Suku Cadang</li>
                            
                    <div class="col-md-7" style="position: absoulte; top: 5%; left: 62%">
                        <div class="input-group mb-3">
                        <form action="{{ url('cari') }}" method="GET">
                            <input type="text" name="name" placeholder="Cari..." class="form-control bg-light" style="color: black;" >
                        </form>
                            <div class="input-group-prepend">
                                <span class="input-group-text"  style="background-color: #8B0000;" id="basic-addon1">
                                    <i class="fas fa-search" style="color: white;"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- <li class="breadcrumb-item " aria-labelledby="page">
                                @foreach($categories as $category)
                                <a class="breadcrumb-item " href="{{ route('spareparts.category', $category->id) }}">
                                    {{ $category->name }}
                                </a>
                                @endforeach
                                <a class="breadcrumb-item " href="{{ url('sparepart') }}">
                                    Semua Sparepart
                                </a>
                            </li> -->
                </ol>
                    
            </nav>
        </div>
                            
    </div>
<section class="item content mb-5">
<br><br><br><br><br><br>
    <div class="container toparea1">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Merek</th>
                                    <th>Harga</th>
                                    <th>Biaya Instalasi</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($spareparts as $sparepart)
                                <tr class="text-center">
                                    <td style="color: #444;">{{ $no++ }}</td>
                                    <td style="color: #444;">{{ $sparepart->nameS }}</td>
                                    <td style="color: #444;">{{ $sparepart->category->name }}</td>
                                    <td style="color: #444;">Rp. {{ number_format($sparepart->price) }}</td>
                                    <td style="color: #444;">Rp. {{ number_format($sparepart->biayaPemasangan) }}</td>
                                    <td style="color: #444;">{{ $sparepart->stock }} pcs</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><br><br>
@endsection