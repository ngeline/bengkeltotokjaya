@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <br><br><br>
        <div class="row mb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb align-items-center">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Beranda</a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Daftar Suku Cadang</li>
                    </ol>

                </nav>
            </div>

        </div>
        <section class="item content mb-5">
            <div class="container toparea1 mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped" id="table-spareparts">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Merek</th>
                                            <th>Harga</th>
                                            <th>Biaya Instalasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($spareparts as $sparepart)
                                            <tr class="text-center">
                                                <td style="color: #444;">{{ $no++ }}</td>
                                                <td style="color: #444;">{{ $sparepart->nameS }}</td>
                                                <td style="color: #444;">{{ $sparepart->category->name }}</td>
                                                <td style="color: #444;">Rp. {{ number_format($sparepart->price) }}</td>
                                                <td style="color: #444;">Rp.
                                                    {{ number_format($sparepart->biayaPemasangan) }}</td>
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
    @endsection

    @push('js')
        <script>
            $('#table-spareparts').DataTable({
                responsive: true
            });
        </script>
    @endpush
