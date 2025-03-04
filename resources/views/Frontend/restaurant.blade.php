@extends('layout.app')

@section('title') restaurants @endsection

@section('content')



<section class="banner-inner haslayout padding-section parallax-window room" data-position="center 0" data-parallax="scroll" data-bleed="100" data-speed="0.2" style="background-image: url(' {{ asset('/storage/app/public/' . $Banner->restaurant_banner) }}');">

  <div class="awe-overlay-intro">

      <div class="container">

        <h1>Restaurants</h1>

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

              @foreach($Restaurant as $item)

              <div class="row level-1">               

                <div class="col-xs-12 col-sm-7 col-md-6">

                  <div class="room-slider">

                    <img src="{{ asset('/storage/app/public/' . $item->image) }}" alt="">

                    <div class="owl-carousel owl-theme owl-type1 hover14 hvr-shutter-in-horizontal">

                      

                      <a href="#" data-background="{{asset('assets/images/restaurant-main.jpg')}}" style="background-image: url('{{asset('assets/images/restaurant-main.jpg')}}');"  data-effect="fadeInLeft" title=""></a>

                      <a href="#" data-background="{{asset('assets/images/gallery/restaurant-1.webp')}}" alt=""></a>

                      <a href="#" data-background="{{asset('assets/images/gallery/restaurant-2.jpg')}}" alt=""></a>

                      <a href="#" data-background="{{asset('assets/images/gallery/restaurant-3.webp')}}" alt=""></a>

                      <!-- <a href="#" data-background="images/gallery/restaurant-4.jpg" alt=""></a> -->

                    </div>

                  </div>

                </div>  

                  

                <div class="col-xs-12 col-sm-5 col-md-6 bg-col">

                  <div class="text-holder">

                    <img src="{{ asset('/storage/app/public/' . $item->logo) }}" class="lagracia text-center " alt="Lagracia">

                    <!-- <div id="common-heading"><h1>GRACE CAFÉ</h1></div> -->

                      <p>{{$item->description}}</p>

                      <div class="photo-virtural-holder">

                      <ul>

                        <li><a href="https://www.facebook.com/lagraciarestaurant/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

                        

                        <li><a href="{{asset('assets/images/gallery/restaurant-main.jpg')}}" class="with-caption image-link rrestaurant" title=""><i class="fa fa-picture-o" aria-hidden="true"></i></a>

                        <a href="{{asset('assets/images/gallery/restaurant-1.webp')}}" class="with-caption image-link rrestaurant" title="">

                        <a href="{{asset('assets/images/gallery/restaurant-2.jpg')}}" class="with-caption image-link rrestaurant" title="">

                        <a href="{{asset('assets/images/gallery/restaurant-3.webp')}}" class="with-caption image-link rrestaurant" title="">

                            <!--<a href="images/gallery/restaurant-4.jpg" class="with-caption image-link rrestaurant" title=""></a></li> -->



                            <li><a href="vtours/restaurant/index.html?iframe=true" data-xs-href="vtours-xs/index.html?panorama=images/restaurant.jpg&iframe=true" class="with-caption image-link vtours" title=""><i><img src="{{asset('assets/images/360.png')}}"></i></a></li>

                            </ul>

                          </div>

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