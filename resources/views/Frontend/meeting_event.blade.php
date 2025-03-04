@extends('layout.app')
@section('title') Meeting event @endsection
@section('content')
<section class="banner-inner haslayout padding-section parallax-window room" data-position="center 0" data-parallax="scroll" data-bleed="100" data-speed="0.2" style="background-image: url(' {{ asset('/storage/app/public/' . $Banner->meeting_banner) }}');">
  <div class="awe-overlay-intro">
      <div class="container">
        <h1>Meetings &amp; Events</h1>
      </div>
  </div>
</section>

<div class="container">
	<div class="row">
		<div class="col-md-12">	
			<div class="section-restaurant">
        <div class="wrapper-inner">
          <div class="widget-rooms-detail">
            <div class="widget-inner">
              @foreach ($Meeting as $item)
              <div class="row " style="margin-top: 10px">
                <div class="col-sm-7 col-md-6 m-3">
                                   
                  <img src="{{ asset('/storage/app/public/' . $item->image) }}" alt="">
                </div>         
                <div class="col-sm-5 col-md-6 bg-col">
                  <div class="text-holder">
                    <!-- <img src="images/gracecafe-original.png"> -->
                    <div id="common-heading"><h1 style="padding-bottom: 20px;">{{$item->title}}</h1></div>
                      <p>{{$item->description}}</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection