@extends('layout.app')
@section('title') Contact @endsection
@section('content')

<section class="banner-inner haslayout padding-section parallax-window room" data-position="center 0" data-parallax="scroll" data-bleed="100" data-speed="0.2" style="background-image: url(' {{ asset('/storage/app/public/' . $Banner->contact_banner) }}');">
    <div class="awe-overlay-intro">
        <div class="container">
			<h1>Contact Us</h1>
        </div>
    </div>
</section>

<div id="contact-us">
<div class="container">
	<div class="row">
		<div class="col-md-8">
		<h2>Send Us Query</h2>	
			<div class="left">
			<p>We are here to answer any questions you may have about us. Reach out to us and we'll respond as soon as we can.
			Even if there is something you have always wanted to experience and can't find it on, let us know and we promise we'll do our best to find it for you and send you there.</p>
				<div class="contact-form">

					<form action="{{route('sendContactMail')}}" method="POST">
						@if(session()->has('message'))
						<div class="alert alert-success">
							{{ session()->get('message') }}
						</div>
					@endif
						@csrf()
						<div class="row">
							<div class="col-md-6">
							  	<div class="form-group">
							    	<label>Name:</label>
							    	<input type="text" class="form-control" name="name" required="">
							  	</div>
							</div>
							<div class="col-md-6">
						  		<div class="form-group">
						    		<label>Email:</label>
						    		<input type="email" class="form-control" name="sendEmail" required="">
						  		</div>
						  	</div>
							<div class="col-md-12">
						  		<div class="form-group">
						    		<label>Message:</label>
						    		<input type="text" class="form-control message" name="sendMessage" required="">
						  		</div>
						  	</div>
					 		<div class="col-md-12">
					 			<div class="submit-button">
						 			<div class="form-group">
						  				<button type="submit" class="btn btn-default hvr-shutter-in-horizontal" >Submit</button>
						  			</div>
						  		</div>
					  		</div>
					  	</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4">
		<h2>Find Us</h2>	
			<div class="right">
				<ul>
					<li class="heading">Email</li>
					<!-- <li class="details">info@hotelgrace21.com</li> -->
					<li class="details">{{$Contact->email}}</li>
				</ul>
				<ul>
					<li class="heading">Phone</li>
					<!-- <li class="details">+880 18 4418 7817</li> -->
					<li class="details">{{$Contact->phone}}</li>
				</ul>
				<ul>
					<li class="heading">Address</li>
					<li class="details">{{$Contact->address}}</li>
				</ul>
				<ul class="social-links">
					<li><a href="{{$Contact->phone}}" target="_blank"><i class="fa fa-whatsapp icon" aria-hidden="true"></i></a></li>
          			<li><a href="mailto:{{$Contact->email}}" target="_blank"><i class="fa fa-envelope icon" aria-hidden="true"></i></a></li>

          			<li><a href="{{ parse_url($Contact->facebook, PHP_URL_SCHEME) === null ? 'https://' . $Contact->facebook : $Contact->facebook }}" target="_blank"><i class="fa fa-facebook icon" aria-hidden="true"></i></a></li>
          			<li><a href="{{ parse_url($Contact->instagram, PHP_URL_SCHEME) === null ? 'https://' . $Contact->instagram : $Contact->instagram }}" target="_blank"><i class="fa fa-instagram icon" aria-hidden="true"></i></a></li>
          			<li><a href="{{ parse_url($Contact->youtube, PHP_URL_SCHEME) === null ? 'https://' . $Contact->youtube : $Contact->youtube }}" target="_blank"><i class="fa fa-youtube icon" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
				
				
    	</div>
    </div>
    <iframe src="{{$Contact->map_link}}" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>

</div>
@endsection