@extends('layouts.app')

@section('content')
{{-- <header class="item1 header margin-top-0" style="background-image: url(images/mobil.jpg);  width: 100%;" id="section-home" data-stellar-background-ratio="0.5">
	<div class="wrapper">
		<div class="container">
			<div class="row intro-text align-items-center justify-content-center">
				<div class="col-md-10 animated tada">
					<center>
						<h1 class="site-heading site-animate" style="font-size: 47px;">
							<strong class="d-block" data-scrollreveal="enter top over 1.5s after 0.1s">Hubungi kami</strong>
						</h1>

						<h3 style="font-size: 18px; font-family: system-ui; font-weight: normal; color: white"> Terima kasih telah mengunjungi situs web kami, jika Anda memiliki pertanyaan, Anda dapat. Terima kasih telah mengunjungi situs web kami, jika Anda memiliki pertanyaan, Anda dapat
						hubungi kami di nomor telepon 0852-3577-5571 atau isi form berikut: </h3><br><br>
					</center>
					<br><br>
				</div>
			</div>
		</div>
	</div>
</header> --}}

<div class="section section-hero section-shaped"
        style="background-image: url({{ asset('images/mobil.jpg') }}); width: 100%">
        <div class="shape shape-style-3 shape-default">
        </div>
        <div class="page-header">
            <div class="container shape-container d-flex align-items-center py-lg">
                <div class="col">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-12 text-center">
                            <h1 class="site-heading site-animate" style="font-size: 47px;">
                                <strong class="d-block" data-scrollreveal="enter top over 1.5s after 0.1s">Hubungi kami</strong>
                            </h1>

                            <h3 style="font-size: 18px; font-family: system-ui; font-weight: normal; color: white"> Terima kasih telah mengunjungi situs web kami, jika Anda memiliki pertanyaan, Anda dapat. Terima kasih telah mengunjungi situs web kami, jika Anda memiliki pertanyaan, Anda dapat
                                hubungi kami di nomor telepon 0852-3577-5571 atau isi form berikut: </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- CONTENT =============================-->
<section class="item content">
	<div class="container toparea">
		<div class="underlined-title">
			<div class="editContent mt-5">
				<h1 class="text-center latestitems">Kirim disini</h1>
			</div>
			<div class="wow-hr type_short mt-3">
				<span class="wow-hr-h">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mt-3">
				<form method="POST" action="{{ url('contact') }}/{{ auth()->user()->id }}" id="contactform">
					{{ csrf_field() }}
					<div class="form">
						<div class="col">
							<input value="{{ Auth::user()->name }}" style="display:none;" class="place @error('name') is-invalid @enderror" type="text" name="name" placeholder="Nama...">
							@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="col">
							<input value="{{ Auth::user()->email }}" style="display:none;" class="place  @error('email') is-invalid @enderror" type="text" name="email" placeholder="Alamat Email...">
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="col-md-12">
							<textarea class="place form-control @error('pesan') is-invalid @enderror" name="pesan" rows="7" placeholder="Pesan..."></textarea>
							@error('pesan')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
                            <input type="submit" id="submit" class="clearfix btn btn-info mt-3" value="Kirim">
						</div>
					</div>
				</form>
				<br>
				<br>
				<div class="row">

					<!-- Content Column -->
					<div class="col-lg-6 mb-4">

						<!-- Project Card Example -->
						<div class="card shadow mb-4">
							<div class="card-header py-3 " style="background-color: #333">
								<h6 class="m-0 font-weight-bold" style="color: 	#fff;">Riwayat chat</h6>
							</div>
							<div class="card-body">
								<table class="table">
									<tbody>
										@foreach($contacts as $contact)
										<tr>
											<td style="font-size: 13px; color: #444;">{{ $contact->pesan }}</td>
											<td style="font-size: 13px; color: #444; text-align:right;">{{ $contact->created_at }}</td>
										</tr>
										<tr>
											@if($contact->reply == null)
											<td style="color:#1a9bfc; font-size: 13px;">Belum ada balasan</td>
											@else
											<td style="color:#1a9bfc; font-size: 13px;">Admin Reply : {{ $contact->reply }}</td>
											@endif
										</tr>
										@endforeach
									</tbody>
								</table>
							<!--  -->
							</div>
						</div>

					</div>

					<div class="col-lg-6 mb-4">

						<!-- Illustrations -->
						<div class="card shadow mb-4">
							<div class="card-header py-3" style="background-color: 	#333;">
								<h6 class="m-0 font-weight-bold" style="color: 	#fff;">Tentang bengkel delta</h6>
							</div>
							<div class="card-body">
								<div class="text-center">
									<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="images/undraw_posting_photo.svg" alt="">
								</div>
								<p style="font-size: 13px; color: #444; text-align:justify;"> Mobil merupakan aset berharga di masyarakat karena mobil dapat menjadi alat transportasi, hobi dan gaya hidup.
										Oleh karena itu perlu dilakukan perbaikan secara berkala agar tidak rusak.
										Bengkel Mobil Delta menyediakan bengkel yang menjamin kualitas pelayanan prima, cepat dan terjangkau.
									<a target="_blank" rel="nofollow" href="{{ url('booking') }}">Booking sekarang...</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</section><br><br>
@endsection
