<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @php

    $contactInfo = App\Models\CompanyInfo::first(); // Retrieve the first record

    @endphp

    <title>{{$contactInfo->name}} | @yield('title') </title>

    <!--  styles -->

    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/slider.css')}}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ $contactInfo->logo ? asset('/storage/app/public/' . $contactInfo->logo) : asset('storage/empty') }}">

    <link href="{{asset('assets/css/owl.carousel.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/owl.theme.default.css')}}" rel="stylesheet">

    <!-- Lightbox2 CSS -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

    <link href="{{asset('assets/css/magnific-popup.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/mobilemenu.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>



    <!-- Preloader Style -->

    <style>
    .no-js #loader {
        display: none;
    }

    .js #loader {
        display: block;
        position: absolute;
        left: 100px;
        top: 0;
    }

    .se-pre-con {

        position: fixed;

        left: 0px;

        top: 0px;

        width: 100%;

        height: 100%;

        z-index: 9999;

        background: url(images/25.gif) center no-repeat #f7f7f7;

    }
    </style>

    <script>
    //paste this code under the head tag or in a separate js file.

    // Wait for window load

    $(window).load(function() {

        // Animate loader off screen

        $(".se-pre-con").fadeOut("slow");;

    });



    jQuery.noConflict();

    (function($) {

        $(function() {

            // More code using $ as alias to jQuery

            $('#memberModal').modal('show');

        });

    })(jQuery);
    </script>

</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="menu-section">

                    <div class="menu-toggle">

                        <div class="one"></div>

                        <div class="two"></div>

                        <div class="three"></div>

                    </div>

                    <nav>

                        <ul role="navigation" class="hidden">

                            <li><a href="./">Home</a></li>

                            <li><a href="room.php">Rooms &amp; Suites</a></li>

                            <li><a href="restaurant.php">Restaurants</a></li>

                            <li><a href="meeting.php">Meeting &amp; Events</a></li>

                            <li><a href="reservation.php">Reservation</a></li>

                            <li><a href="offers.php">Special Offers</a></li>

                            <li><a href="#">Gallery</a></li>

                            <li><a href="contact-us.php">Contact</a></li>

                        </ul>

                    </nav>

                </div>

            </div>

        </div>
    </div>

    <div id="top-head">

        <div class="container">

            <div class="row">

                <div class="border-top">

                    <div class="col-sm-8 col-md-6">

                        <ul class="left">

                            <li><i class="fa fa-phone icon"
                                    aria-hidden="true"></i>{{$contactInfo->phone ? $contactInfo->phone : "empty" }}</li>

                        </ul>

                    </div>

                    <div class="col-sm-4 col-md-6">

                        <div class="right">

                            <ul class="right">
                                <li><a href="https://www.booking.com/hotel/bd/grace-21-smart.en-gb.html"
                                        target="_blank"><i><img src="images/booking.png" title="booking.com"
                                                class="icon"></i></a></li>

                                <li><a href="https://www.agoda.com/en-au/grace-21-smart-hotel/hotel/all/dhaka-bd.html?checkin=2017-07-25&los=1&adults=2&rooms=1&cid=-218&searchrequestid=4471790e-14a9-4e05-9258-155abf94808a"
                                        target="_blank" title="agoda.com"><i><img src="images/agoda.png"
                                                class="agoda icon"></i></a></li>

                                <li><a href="https://www.expedia.co.in/Dhaka-Hotels-Grace-21-Smart-Hotel.h18641303.Hotel-Information?rfrr=Redirect.From.www.expedia.com%2FDhaka-Hotels-Grace-21-Smart-Hotel.h18641303.Hotel-Information"
                                        target="_blank" title="expedia.co.in"><i><img src="images/expedia.in.svg"
                                                class="expedia icon"></i></a></li>

                                <li><a href="https://www.tripadvisor.com/Hotel_Review-g293936-d12441404-Reviews-Grace_21_Smart_Hotel-Dhaka_City_Dhaka_Division.html"
                                        target="_blank"><i class="fa fa-tripadvisor icon" aria-hidden="true"></i></a>
                                </li>



                                <li><a href="https://www.facebook.com/hotelgrace21/" target="_blank"><i
                                            class="fa fa-facebook icon" aria-hidden="true"></i></a></li>

                                <li><a href="https://twitter.com/hotelgrace21" target="_blank"><i
                                            class="fa fa-twitter icon" aria-hidden="true"></i></a></li>

                                <li><a href="https://www.youtube.com/channel/UCSzPxnOyrqJpG6izoQOpu1A"
                                        target="_blank"><i class="fa fa-youtube icon" aria-hidden="true"></i></a></li>

                                <li><a href="https://www.instagram.com/hotelgrace21/" target="_blank"><i
                                            class="fa fa-instagram icon" aria-hidden="true"></i></a></li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- #top-head ends -->

    <div id="inner-page-nav">

        <div class="container">

            <div class="navbar">

                <div class="logo sopnil" style="text-align: center;">

                    <a href="./"><img
                            src="{{ $contactInfo->logo ? asset('/storage/app/public/' . $contactInfo->logo) : asset('storage/empty') }}">

                    </a>

                </div>

                <div class="social">

                    <ul class="left">

                        <li><a href="" target="_blank"><i class="fa fa-phone icon" aria-hidden="true"></i>
                                {{$contactInfo->phone ? $contactInfo->phone : "empty"}}</a></li>

                        <li><a href="https://wa.me/+{{$contactInfo->phone ? $contactInfo->phone:" 016789"}}?text=Hello%20there!"
                                target="_blank"><i class="fa fa-whatsapp icon" aria-hidden="true"></i></a></li>

                        <li><a href="mailto:{{$contactInfo->email ? $contactInfo->email:"demo@gmail.com"}}"
                                target="_blank"><i class="fa fa-envelope icon" aria-hidden="true"></i></a></li>



                        <li><a href="{{ parse_url($contactInfo->facebook, PHP_URL_SCHEME) === null ? 'https://' . $contactInfo->facebook : $contactInfo->facebook }}"
                                target="_blank"><i class="fa fa-facebook icon" aria-hidden="true"></i></a></li>

                        <li><a href="{{ parse_url($contactInfo->instagram, PHP_URL_SCHEME) === null ? 'https://' . $contactInfo->instagram : $contactInfo->instagram }}"
                                target="_blank"><i class="fa fa-instagram icon" aria-hidden="true"></i></a></li>

                        <li><a href="{{ parse_url($contactInfo->youtube, PHP_URL_SCHEME) === null ? 'https://' . $contactInfo->youtube : $contactInfo->youtube }}"
                                target="_blank"><i class="fa fa-youtube icon" aria-hidden="true"></i></a></li>



                    </ul>

                </div>

                <div class="nav" id="menu">

                    <ul class="right">

                        <li><a href="{{url('/')}}" class="link-1">Home</a></li>

                        <li><a href="{{route('room')}}" class="link-1">Rooms &amp; Suites</a></li>

                        <li><a href="{{route('meeting-event')}}" class="link-1 ">Meetings &amp; Events</a></li>

                        <li><a href="{{route('restaurant')}}" class="link-1 ">Restaurants</a></li>

                        <li><a href="{{route('reservation')}}" class="link-1">Reservation</a></li>

                        <li><a href="{{route('specialOffer')}}" class="link-1">Special Offers</a></li>

                        <li><a href="{{route('gallery')}}" class="link-1">Gallery</a></li>

                        <li><a href="{{route('contact')}}" class="link-1 ">Contact</a></li>

                    </ul>

                    <p class="lite-text">Shopnil Shindu</p>

                    <img src="{{asset('assets/images/close.png')}}" class="close-icon" onclick="closemenu()">

                </div>

                <img src="{{asset('assets/images/menu.png')}}" class="menu-icon" onclick="openmenu()">



            </div>

        </div>

    </div>

    <!-- ends .menu-navs -->

    {{--End header--}}

    @yield('content')



    {{-- Footer  --}}

    <section>

        <div class="footer">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12 col-md-4">

                        <h3 style="text-align:left">Address</h3>

                        <p style="width: 300px; text-align:left">
                            {{ $contactInfo->address ? $contactInfo->address : 'empty' }}</p>

                    </div>

                    <div class="col-xs-6 col-md-4">

                        <ul>

                            <li><a href="{{route('home')}}">Home</a></li>

                            <li><a href="{{route('room')}}">Rooms &amp; Suites</a></li>

                            <li><a href="{{route('restaurant')}}">Restaurants</a></li>

                        </ul>

                    </div>

                    <div class="col-xs-6 col-md-4">

                        <ul>

                            <li><a href="{{route('meeting-event')}}">Meetings &amp; Events</a></li>

                            <li><a href="{{route('gallery')}}">Photo Gallery</a></li>

                            <li><a href="{{route('contact')}}">Contact Us</a></li>

                        </ul>

                    </div>

                </div>

                <div class="footer-bottom">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="copyright">

                                <p>&copy; {{ $contactInfo->footer_title ? $contactInfo->footer_title : 'empty' }}</p>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="siteby">

                                <p><span>Site By </span><a href="https://cubixbd.com/" target="_blank"><strong>Cubix
                                            Technology</strong> </a></p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        </div>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- Lightbox2 JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

    <script>
    var menu = document.getElementById("menu");



    function closemenu() {

        menu.style.top = "-100vh";

    }

    function openmenu() {

        menu.style.top = "0";

    }
    </script>



    <script type="text/javascript">
    window.addEventListener("scroll", function() {

        var inner_page_nav = document.querySelector("inner-page-nav");

        inner_page_nav.classList.toggle("sticky", window.scrollY > 0);

    })
    </script>

</body>

</html>