@extends('layout.app')
@section('title') Rooms @endsection
@section('content')

<section class="banner-inner haslayout padding-section parallax-window room" data-position="center 0" data-parallax="scroll" data-bleed="100" data-speed="0.2" style="background-image: url(' {{ asset('/storage/app/public/' . $Banner->room_banner) }}');">
    <div class="awe-overlay-intro">
        <div class="container">
			<h1>Rooms &amp; Suites</h1>
        </div>
    </div>
</section>

<div class="container">
	<div class="row">
		<div class="col-md-12">	
			<div class="widget-rooms-list">
				@foreach($Rooms as $item)
					<form action="{{route('reservation')}}" method="get">
					<div class="rooms-item">
						<div class="item-photo hover14">
							<a href="#" data-background="{{ asset('/storage/app/public/' . $item->image) }}" style="background-image: url('{{ asset('/storage/app/public/' . $item->image) }}');"></a>
						</div>
						<div class="item-desc">
							<h2><a href="#">{{$item->title}}</a></h2>
							<input type="hidden" name="roomName" value="{{$item->title}}">
							<p>{{$item->description}}</p>
							<div class="desc-features">
								<?php
								$items = explode(',', $item->fetcher);
								?>								
								<ul>
									<?php foreach ($items as $list): ?>
										<li><i class="fa fa-check"></i> <?php echo trim($list); ?></li>
									<?php endforeach; ?>
								</ul>								
							</div>
						</div>
						<div class="item-price">
							<div class="price-inner">
								<h3>{{$item->price}}BDT</h3>
								<h5>Per Night</h5>
								<li class="check" style="list-style-type: none; margin-top:20px">
									<button name="index-reservation" class="hvr-shutter-in-horizontal" style="cursor:pointer; padding:10px"><h2>Book Now</h2></button>
								</li>				
								<ul>									
								</ul>
							</div>
						</div>
					</div><!-- .rooms-item ends -->
				</form>
				@endforeach
    		</div><!-- .widget-rooms-list ends -->
    	</div>
    </div>
</div>
@endsection