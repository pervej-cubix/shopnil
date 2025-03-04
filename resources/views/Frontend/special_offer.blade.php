@extends('layout.app')

@section('title') Special offer @endsection

@section('content')



<section class="banner-inner haslayout padding-section parallax-window room" data-position="center 0" data-parallax="scroll" data-bleed="100" data-speed="0.2" style="background-image: url(' {{ asset('/storage/app/public/' . $Banner->special_offer_banner) }}');">

	<div class="awe-overlay-intro">

		<div class="container">

			<h1> Special Offer</h1>

		</div>

	</div>

</section>



<div id="offer-page">

	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<div class="offer-div">



					<h2> Special Offer </h2>
					@foreach($SpecialOffers as $SpecialOffer)
					<img src="{{ $SpecialOffer->image ? asset('/storage/app/public/' . $SpecialOffer->image) : asset('images/empty.jpg') }}" width="960px;">

					@endforeach

				</div>

			</div>

		</div>

	</div>

</div>

@endsection