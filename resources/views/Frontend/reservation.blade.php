@extends('layout.app')
@section('title') Reservation @endsection
@section('content')
@include('sweetalert::alert')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<section class="banner-inner haslayout padding-section parallax-window room" data-position="center 0" data-parallax="scroll" data-bleed="100" data-speed="0.2" style="background-image: url(' {{ asset('/storage/app/public/' . $Banner->reservation_banner) }}');">
    <div class="awe-overlay-intro">
        <div class="container">
            <h1>Reservation</h1>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12"> 
            <div class="section-restaurant">
    
<div class="reservation_content">
   
    <form action="{{route('send-mail')}}" method="POST" >

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @csrf()

        <div class="col-md-12">
            <div class="reservation-detail">
                <h3>Personal Details</h3>
                <div class="row">                  
                    <div class="col-sm-2 col-md-2">
                        <label for="title">Title</label>
                            <select name="title" data-input-type="select" id="fo_res_title"
                                class="form-control formField"
                                style="font-size: 15px; padding: auto 5px;">
                                <option value=""> Select </option>
                                <option value="MR.">MR.</option>
                                <option value="MRS.">MRS.</option>
                                <option value="MS.">MS.</option>
                                <option value="MR. & MRS.">MR. &amp; MRS.</option>
                                <option value="DR.">DR.</option>
                                <option value="NOT APPLICABLE">NOT APPLICABLE</option>
                                <option value="MR. MRS.">MR. MRS.</option>
                            </select>
                    </div>
                    <div class="col-sm-5 col-md-5">
                        <label>First Name</label> 
                        <input class="form-control formField"  type="text" name="first_name" required="">
                    </div>
                    <div class="col-sm-5 col-md-5">
                        <label>Last Name</label> 
                        <input class="form-control formField"  type="text" name="last_name" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <label>Address</label> 
                        <input class="form-control formField" placeholder=""  type="text" name="address" required="">
                    </div>
                    <div class="col-sm-6">
                        <label for="country">Country</label>
                        <select class="form-control formField" name="country" data-input-type="select" id="fo_res_country">

                        </select>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Email Address</label> <input class="form-control formField" type="email" name="email" required="">
                    </div>
                    <div class="col-sm-6">
                        <label>Phone</label>
                        <input class="form-control formField" type="number" name="phone" required="">
                    </div>
                </div>

                <div class="reservation-info">
                    <h3>Reservation Information</h3>
                </div> 

                <div class="row">
                    <div class="col-sm-12 col-md-6 check_availability-field">
                    <label for="datepicker">Check in</label>
                        <input type="date" class="form-control formField formField reservation_formField" id="checkin" value="{{$Booking['checkin'] ?? ''}}"
                        name="checkin" placeholder="Select Date" required>
                    </div>
                    <div class="col-sm-12 col-md-6 check_availability-field">
                    <label for="checkout">Check out</label>
                        <input type="date" class="form-control formField formField reservation_formField" name="checkout" value="{{$Booking['checkin'] ?? ''}}"
                        id="checkout" placeholder="Select Date" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label>Room Type</label>                        
                        <select name="room_type" class="form-control formField" id="roomtype" required>
                        </select>
                    </div>
                    <div class="col-md-6  col-sm-12">
                        <label>Number of Room</label>
                         <select aria-required="true" class="form-control formField" name="room_no" required ="">
                            <option value="">
                                Select Number of Room </option>
                            <option value="1">
                                1
                            </option>
                            <option value="2">
                                2
                            </option>
                            <option value="3">
                                3
                            </option>
                            <option value="4">
                                4
                            </option>
                            <option value="5">
                                5
                            </option>
                            <option value="6">
                                5+
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label>Number of Person</label> 
                        
                        <select aria-required="true" class="form-control formField" name="adult_no"  required="">
                            <option value="{{$Booking['adult'] ?? ''}}">
                                {{$Booking['adult'] ?? 'Select Number of Person'}} 
                            </option>
                            <option value="1">
                                1
                            </option>
                            <option value="2">
                                2
                            </option>
                            <option value="3">
                                3
                            </option>
                            <option value="4">
                                4
                            </option>
                            <option value="5">
                                5
                            </option>
                            <option value="6">
                                6
                            </option>
                            <option value="7">
                                7
                            </option>
                            <option value="8">
                                8
                            </option>
                            <option value="9">
                                8+
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label>Number of Children</label> 
                        <select aria-required="true" class="form-control formField" name="child_no">
                            <option value="{{$Booking['adult'] ?? ''}}">
                                {{$Booking['adult'] ?? 'Select Number of Children'}} 
                            </option>
                            <option value="1">
                                1
                            </option>
                            <option value="2">
                                2
                            </option>
                            <option value="3">
                                3
                            </option>
                            <option value="4">
                                4
                            </option>
                            <option value="5">
                                5
                            </option>
                            <option value="6">
                                6
                            </option>
                            <option value="7">
                                7
                            </option>
                            <option value="8">
                                8
                            </option>
                            <option value="9">
                                8+
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <label for="requirements">Special Requirements</label>
                            <textarea style="height: 45px; font-size: 15px;" class="form-control formField" id="requirements"
                            name="requirements" rows="1" placeholder="Enter your comments"></textarea>
                    </div>
                    
                    {{-- <div class="col-md-6 col-sm-12">
                        {!! NoCaptcha::display() !!}
                        {!! NoCaptcha::renderJs() !!}
                    </div> --}}
                    <div class="col-md-6 col-sm-12">
                        <label for="requirements"></label>
                        <button style="display: block;" type="submit" class="btn btn-default book-now hvr-shutter-in-horizontal fs-16">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
        </div><!-- END / CONTENT -->
    </form>
</div>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    
    //   ========= api call ==========
    const apiUrl = "http://localhost/pms-ci-develop/api";
    const countryUrl = `${apiUrl}/countrysList`;
    const roomTypesUrl = `${apiUrl}/roomTypes`;

    window.addEventListener('DOMContentLoaded', () => {
        Promise.all([
            fetch(countryUrl).then(res => res.json()),
            fetch(roomTypesUrl).then(res => res.json())
        ])
        .then(([countryData, roomTypeData]) => {
            // Example: populate dropdowns
            populateCountries(countryData);
            populateRoomTypes(roomTypeData);
        })
        .catch(err => {
            console.error("❌ Error loading data:", err);
        });
    });

    function populateCountries(data) {
    // Empty the select element
    $("#fo_res_country").empty();

    let option = '<option value="">Select Country</option>'; // Default placeholder option

    data.data.forEach(function(item) {
        // Check if the country is Bangladesh and set the selected attribute
        if(item.id === "19") {
            option += '<option value="' + item.id + '" selected>' + item.en_short_name + '</option>';
        } else {
            option += '<option value="' + item.id + '">' + item.en_short_name + '</option>';
        }
    });


    // Add the options to the select element
    $("#fo_res_country").html(option);
    }

    function populateRoomTypes(data) {
        // Empty the select element
        $("#roomtype").empty();

        // Create the default "Select" option
        var option = '<option value="">Select</option>';

        // Loop through the countries data and add each option to the dropdown
        data.data.forEach(function(item) {
            option += '<option value="' + item.roomid + '">' + item.roomtype + '</option>';
        });

        // Add the options to the select element
        $("#roomtype").html(option);
    }
</script> 

@endsection