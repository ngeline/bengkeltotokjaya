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
                      <li class="breadcrumb-item active" aria-current="page">Edit Service Panggilan</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Edit Service Panggilan</h1> 
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{ url('bookingpanggilanadmin') }}/{{ $booking->id }}" id="contactform">
                {{ csrf_field() }}
                    <div class="card  shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: 	#1E1E2D;">Edit Data Servis</h6>
                            <br>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_stnk"> Nama STNK</label>
                                    <input type="text" class="form-control @error('name_stnk') is-invalid @enderror" name="name_stnk" id="name_stnk" placeholder="Masukkan nama yang tertera di STNK" value="{{ $booking->name_stnk }}" required autofocus>
                                    @error('name_stnk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number_plat"> Nomor PLAT Mobil</label>
                                    <input type="text" class="form-control @error('number_plat') is-invalid @enderror" name="number_plat" id="number_plat" placeholder="Masukkan nomor plat" value="{{ $booking->number_plat }}" required>
                                    @error('number_plat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_mobil"> Nama Mobil</label>
                                    <input type="text" class="form-control @error('nama_mobil') is-invalid @enderror" name="nama_mobil" id="nama_mobil" placeholder="Masukkan nama mobil"  value="{{ $booking->nama_mobil }}"  autocomplete="nama_mobil"  required>
                                    @error('nama_mobil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_mobil"> Merek Mobil</label>
                                    <input type="text" class="form-control @error('jenis_mobil') is-invalid @enderror" name="jenis_mobil" id="jenis_mobil" placeholder="Masukkan Merek Mobil" value="{{ $booking->jenis_mobil }}" required autocomplete="jenis_mobil" >
                                    @error('jenis_mobil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="service_date"> Tanggal</label>
                                    <input type="date" readonly class="form-control @error('service_date') is-invalid @enderror" name="service_date" id="service_date" placeholder="Masukkan tanggal service" value="{{ $booking->service_date }}" required>
                                    @error('service_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="montir"> Nama Montir</label>
                                    <select class="form-control  @error('montir') is-invalid @enderror" id="montir" type="text"   name="montir" required>
                                        <option value="{{ $booking->montir }}">{{ $booking->montir }}</option>
                                        @foreach($datamt as $mt)
                                        <option value="{{ $mt->name }}">{{ $mt->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('montir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6"  rows="7">
                                <div class="form-group">
                                    <label for="complaint"> Keluhan Mobil</label>
                                    <textarea rows="7" type="text" class="form-control  @error('service_complaint') is-invalid @enderror" name="complaint" id="complaint" placeholder="Masukkan keluhan mobil" required>{{ $booking->complaint }}</textarea>
                                    @error('complaint')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <button type="submit" id="submit" class="btn btn-primary" style="width: 48%; font-weight: bold; font-size: 16px;">
                                    Ubah
                                </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</section>
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