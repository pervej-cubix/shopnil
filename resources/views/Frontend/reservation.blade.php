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
   
    <form id="reservationForm"> 
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
                                <option value="1">MR.</option>
                                <option value="2">MRS.</option>
                                <option value="3">MS.</option>
                                <option value="4">MR. &amp; MRS.</option>
                                <option value="5">DR.</option>
                                <option value="6">NOT APPLICABLE</option>
                                <option value="7">MR. MRS.</option>
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
                        <select class="form-control formField" name="country" data-input-type="select" id="fo_res_country"

                            @foreach($countries as $country)
                                <option value="{{ $country['id'] }}" @if($country['en_short_name']==='Bangladesh' )
                                    selected @endif>
                                    {{ $country['en_short_name'] }}
                                </option>
                            @endforeach
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
                        
                        <select name="roomtype" class="form-control formField" id="roomtype" required>
                        <option value=""> Select </option>
                        @foreach($roomTypes as $roomType)
                        <option value="{{ $roomType['roomid'] }}">{{ $roomType['roomtype'] }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-6  col-sm-12">
                        <label>Number of Room</label> <select aria-required="true" class="form-control formField" name="room_no" required ="">
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
                        <select aria-required="true" class="form-control formField" name="child_no"  required="">
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
                    
                    <div class="col-md-6 col-sm-12">
                        {!! NoCaptcha::display() !!}
                        {!! NoCaptcha::renderJs() !!}
                    </div>
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

    document.getElementById("reservationForm").addEventListener("submit", function(event) {
        event.preventDefault();
        const formData = {};
        
        const formFields = document.querySelectorAll(".formField");
        formFields.forEach(field => {
        formData[field.name] = field.value;
        });
        formData['adult_no'] = parseInt(formData.adult_no);
        formData['room_no'] = parseInt(formData.room_no);
        formData['child_no'] = parseInt(formData.child_no);

        const recaptchaResponse = grecaptcha.getResponse();
        if (recaptchaResponse.length === 0) {
            // If CAPTCHA is not verified
            Swal.fire({
                icon: 'error',
                title: 'Captcha Required',
                text: 'Please complete the CAPTCHA to proceed.',
            });
            return; // Stop the form submission
        }
        fetch('/reservation', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formData),
            })
            .then(response => response.json())
            .then(data => {
                console.log("f", data);
                Swal.fire({
                    icon: 'success',
                    title: 'Reservation Successful',
                    text: data.messages || 'Your reservation has been submitted successfully!',
                });
            })
            .catch(error => {
                console.log('Error:', error);

                Swal.fire({
                    icon: 'error',
                    title: 'Submission Failed',
                    text: error.message,
                });
            });

            document.getElementById("reservationForm").reset();
            grecaptcha.reset();
    })

    document.addEventListener('DOMContentLoaded', function() {
    const checkin = document.getElementById('checkin');
    const checkout = document.getElementById('checkout');
    const roomtype = document.getElementById('roomtype');

    function availabilityCheck() {
        const bodyData = {
            checkin: checkin.value,
            checkout: checkout.value,
            roomtype: roomtype.value
        };

        console.log(bodyData);

        // Make sure all values are filled before sending the request
        if (bodyData.checkin && bodyData.checkout && bodyData.roomtype) {
            fetch("{{ url('/reservation-check') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(bodyData)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status == "success") {
                        console.log(data);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Not Available',
                            text: data.message
                        });
                    }
                })
                .catch(err => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Not Available',
                        text: "Error checking availability"
                    });
                    console.log(err);
                });
        }
    }

    // Attach onchange listeners
    [checkin, checkout, roomtype].forEach(input => {
        input.addEventListener('change', availabilityCheck);
    });

});
</script>

@endsection