@extends('layout.app')

@section('title') Home @endsection

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style>
.bs-slider-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    /* Black with 50% opacity */

}



@keyframes zoomIn {

    from {

        transform: scale(1);

        opacity: 0.9;

    }

    to {

        transform: scale(1.5);

        opacity: 1;

    }

}



@keyframes zoomOut {

    from {

        transform: scale(0);

        opacity: ;

    }

    to {

        transform: scale(1);

        opacity: 0;

    }

}



.zoom-in {

    animation: zoomIn 15s;

}

*/ .zoom-out {

    animation: zoomOut 3s forwards;

}



.text-sliding {

    animation-duration: 2s;

    animation-delay: 0.5s;

}



.carousel-control-prev,

.carousel-control-next {

    position: absolute;

    top: 50%;

    transform: translateY(-50%);

    z-index: 4;

    width: 5%;

}



.fa-long-arrow-left,

.fa-long-arrow-right {

    font-size: 15px;

    color: white;

}



.carousel-control-prev {

    left: 3%;

}


.carousel-control-next {
    right: 2%;
}

.checkin_form_container {
    display: grid;
    gap: 6px;
    width: 100%;
    margin: 0 auto;
    align-items: center;
    padding-left: 0px;
    grid-template-columns: repeat(2, 1fr);
    border: rgba(0, 0, 0, 1);

}

.checkin_form_box {
    color: white;
    text-align: center;
    padding: 20px;
    font-size: 1.2rem;
    text-align: left;
    font-size: 15px;
    width: 100%;
    border-radius: 8px;
}

@media (min-width: 1024px) {
    .checkin_form_container {
        grid-template-columns: repeat(4, 1fr);
    }
}
</style>



<!--	<div id="carouselExample" class="carousel slide" data-ride="carousel">-->

<!--    <div class="carousel-inner" role="listbox">-->

<!--        @foreach ($Slide as $index => $item)-->

<!--        <div class="item {{ $index === 0 ? 'active' : '' }}">-->

<!--            <div class="se-pre-con"></div>-->



<!--            <div class="slide-image zoom-target {{ $index === 0 ? 'zoom-in' : '' }}" style="background-image: url('{{ asset('storage/' . $item->image) }}'); background-size: cover; background-position: center; height: 100vh; width: 100%;">-->

<!--                <div class="bs-slider-overlay"></div>-->

<!--                <div class="container h-100 d-flex align-items-center justify-content-center">-->

<!--                </div>-->

<!--            </div>-->



<!--            <div class="row">-->

<!--                <div class="slide-text text-center text-white">-->

<!--                    <h2 class="animate__animated animate__slideInLeft text-sliding">-->

<!--				        Welcome-->

<!--			        </h2>-->

<!--        			<h3 class="animate__animated animate__zoomIn" style="padding-top: 10px; padding-bottom: 10px; font-size: 25px;">-->

<!--        				To-->

<!--        			</h3>-->



<!--        			<h1 class="animate__animated animate__slideInRight text-sliding">-->

<!--        				{{$item->title}}-->

<!--        			</h1>-->

<!--        			<p class="animate__animated animate__zoomIn" style="font-size: 13px;">-->

<!--        				{{$item->sub_title}}-->

<!--        			</p>-->

<!--                </div>-->

<!--            </div>-->

<!--        </div>-->

<!--        @endforeach-->

<!--    </div>-->

<!--</div>-->



<div id="carouselExample" class="carousel slide" data-ride="carousel" data-pause="false">

    <div class="carousel-inner" role="listbox">

        @foreach ($Slide as $index => $item)

        <div class="item {{ $index === 0 ? 'active' : '' }}">

            <div class="se-pre-con"></div>



            <div class="slide-image zoom-target {{ $index === 0 ? 'zoom-in' : '' }}"
                style="background-image: url('{{ asset('/storage/app/public/' . $item->image) }}'); background-size: cover; background-position: center; height: 100vh; width: 100%;">

                <div class="bs-slider-overlay"></div>

                <div class="container h-100 d-flex align-items-center justify-content-center">

                </div>

            </div>



        </div>

        @endforeach



    </div>

    <div class="row">

        <div class="slide-text text-center text-white">

            <h2 class="animate__animated animate__slideInLeft text-sliding">

                Welcome

            </h2>

            <h2 class="animate__animated animate__fadeIn tooo" style="padding-top: 10px; padding-bottom: 10px;">

                To

            </h2>



            <h1 class="animate__animated animate__slideInRight text-sliding">

                {{$item->title}}

            </h1>

            <p class="animate__animated animate__slideInUp">

                {{$item->sub_title}}

            </p>

        </div>

    </div>



    <div class="row">

        <!-- Left Control -->

        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">

            <span class="fa fa-long-arrow-left" aria-hidden="true"></span>

            <span class="sr-only">Previous</span>

        </a>



        <!-- Right Control -->

        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">

            <span class="fa fa-long-arrow-right" aria-hidden="true"></span>

            <span class="sr-only">Next</span>

        </a>

        <!-- End of Slide -->

    </div>

</div>





<script>
//     $(document).ready(function() {

//         var $firstSlide = $('.carousel-inner .item.active .slide-image');

//         $firstSlide.addClass('zoom-in');

//     });



//     $('#carouselExample').on('slide.bs.carousel', function (e) {

//         var $activeSlide = $(e.relatedTarget).find('.slide-image');

//         var $previousSlide = $(this).find('.carousel-item.active .slide-image');



//         $('.slide-image').removeClass('zoom-in');

//         $activeSlide.addClass('zoom-in');



//     });



$(document).ready(function() {

    var $firstSlide = $('.carousel-inner .carousel-item.active .slide-image');

    $firstSlide.addClass('zoom-in');



    $('#carouselExample').on('slide.bs.carousel', function(e) {

        var $activeSlide = $(e.relatedTarget).find('.slide-image');

        $('.slide-image').removeClass('zoom-in');

        $activeSlide.addClass('zoom-in');

    });



    // Prevent stuck issue by ensuring the carousel continues cycling

    $('#carouselExample').on('slide.bs.carousel', function() {

        $('.carousel-control-prev, .carousel-control-next').removeAttr('disabled');

    });



    $('.carousel-control-prev, .carousel-control-next').on('click', function() {

        $('.carousel-control-prev, .carousel-control-next').attr('disabled', 'disabled');

    });

});
</script>



<div id="main-body">

    <div class="container">

        <div class="row sm-mb-2">

            <div class="col-md-12">

                <div id="bookNow">
                    <div class="container form-container">
                        <form action="{{route('reservation')}}" method="get">
                            <div class="checkin_form_container">
                                <div class="checkin_form_box">
                                    <div class="input-group" style="display: flex; flex-direction: column;">
                                        <label for="">Check in</label>
                                        <input type="date" placeholder="Select date" class="form-control" name="checkin" style="width: 100%;" id="checkin">
                                    </div>
                                </div>
                                <div class="checkin_form_box">
                                    <div class="input-group" style="display: flex; flex-direction: column;">
                                        <label for="">Check out</label>
                                        <input type="date" placeholder="Select date" class="form-control" name="checkout" style="width: 100%;" id="checkout">
                                    </div>
                                </div>
                                <div class="checkin_form_box">
                                    <div class="input-group" style="display: flex; flex-direction: column;">
                                        <label for="">Number of Person</label>
                                        <input type="number" class="form-control" name="adult" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="checkin_form_box" style="margin-top: 25px">
                                    <button class="hvr-shutter-in-horizontal"
                                        style="cursor:pointer; height: 70px; width: 100%;">
                                        <h2>Book Now</h2>
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="about-us" style="margin-top: 150px">
    <div class="container">
        <div class="col-sm-12 col-md-6">
            <h2><b>about us</b></h2>
            <div class="row">

                <div class="col-md-5 ">

                    <h3>{{$About->title}}</h3>

                </div>

                <div class="col-md-7">

                    <p>{{ \Illuminate\Support\Str::limit($About->description, 600) }}</p>


                </div>

            </div>

        </div>

        <div class="col-sm-12 col-md-6">

            <div class="vertpan pic">

                <img src="{{ asset('/storage/app/public/' . $About->image) }}">

            </div>

            <!-- 	<img src="images/ab-crop.jpg"> -->

        </div>

    </div>

</div>



<div class="clearfix"></div>

<div class="facility">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="heading">

                    <h5>Explore</h5>

                    <h2>Our Luxuries Facility</h2>

                </div>



                @foreach($Rooms as $item)



                <div class="col-md-3">

                    <div class="hover14">

                        <img src="{{ asset('/storage/app/public/' . $item->image) }}" style="height: 200px; width:100%">

                    </div>

                    <div class="text">

                        <h3><a href="{{route('room')}}">{{$item->title}}</a></h3>

                        <p>{{ \Illuminate\Support\Str::limit($item->description, 100) }}</p>



                        <a class="links" href="{{route('room')}}">
                            <div class="link hvr-shutter-in-horizontal"><i class="fa fa-long-arrow-right"
                                    aria-hidden="true"></i></div>
                        </a>

                    </div>

                </div>

                @endforeach



            </div>

        </div>

    </div>

</div>



<div class="google-map-section">

    <div class="row">

        <div class="col-xs-12 col-md-8">

            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="100%" height="350" id="gmap_canvas" src="{{$Contact->map_link}}"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                        href="https://www.embedgooglemap.org">embed google maps</a></div>
                <style>
                .mapouter {
                    position: relative;
                    text-align: right;
                    height: 350px;
                    width: 100%;
                }

                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    height: 350px;
                    width: 100%;
                }
                </style>
            </div>

        </div>

        <div class="col-xs-12 col-md-4">

            <div class="text-holder">

                <h3>For new experience please contact us </h3>

                <p class="addrerss">{{$Contact->email}}</p>

                <p class="addrerss">&nbsp;</p>

                <p class="addrerss"><span class="address">Phone: </span></p>

                <p class="addrerss"><span class="address">{{$Contact->phone}}</span></p>

                <p class="follow">Follow Us on </p>

                <ul>

                    <li><a href="https://wa.me/{{$Contact->phone}}?text=Hello%20there!" target="_blank"><i
                                class="fa fa-whatsapp icon" aria-hidden="true"></i></a></li>

                    <li><a href="mailto:{{$Contact->email}}" target="_blank"><i class="fa fa-envelope icon"
                                aria-hidden="true"></i></a></li>

                    <li><a href="{{ parse_url($Contact->facebook, PHP_URL_SCHEME) === null ? 'https://' . $Contact->facebook : $Contact->facebook }}"
                            target="_blank"><i class="fa fa-facebook icon" aria-hidden="true"></i></a></li>

                    <li><a href="{{ parse_url($Contact->instagram, PHP_URL_SCHEME) === null ? 'https://' . $Contact->instagram : $Contact->instagram }}"
                            target="_blank"><i class="fa fa-instagram icon" aria-hidden="true"></i></a></li>

                    <li><a href="{{ parse_url($Contact->youtube, PHP_URL_SCHEME) === null ? 'https://' . $Contact->youtube : $Contact->youtube }}"
                            target="_blank"><i class="fa fa-youtube icon" aria-hidden="true"></i></a></li>

                </ul>

            </div>

        </div>

    </div>

</div>

<script>
flatpickr("#checkin", {
    dateFormat: "Y-m-d",
    minuteIncrement: 1,
    minDate: new Date(),
});
flatpickr("#checkout", {
    dateFormat: "Y-m-d",
    minuteIncrement: 2,
    minDate: new Date().fp_incr(1),
});    
</script>

@endsection
