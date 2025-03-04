@extends('layout.app')
@section('title') Reservation @endsection
@section('content')

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
                    <div class="col-sm-6 col-md-6">
                        <label>First Name</label> 
                        <input class="form-control"  type="text" name="firstName" required="">
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <label>Last Name</label> 
                        <input class="form-control"  type="text" name="lastName" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                    <label>Address</label> 
                        <input class="form-control" placeholder=""  type="text" name="address" required="">
                    </div>
          
                    <div class="col-sm-6">
                        <label>City</label> <input class="form-control" type="text" name="city" required="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label>Email Address</label> <input class="form-control" type="email" name="senderEmail" required="">
                    </div>
                    <div class="col-sm-6">
                        <label>Phone</label><input class="form-control" type="number" name="phone" required="">
                    </div>
                </div>

                
                <div class="reservation-info">
                    <h3>Reservation Information</h3>
                </div> 

                <div class="row">
                    <div class="col-sm-12 col-md-6 check_availability-field">
                        <label>Check In</label> 
                        <input type="date" name="check_in" value="{{$Booking['checkin'] ?? ''}}" placeholder="Select Date" id="input_from" required="">
                    </div>
                    <div class="col-sm-12 col-md-6 check_availability-field">
                        <label>Check Out</label> 
                        <input type="date" name="check_out"  value="{{$Booking['checkin'] ?? ''}}" placeholder="Select Date" id="input_to" required="" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label>Room Type</label> <select class="form-control" placeholder="Select Room Type" name="roomType" required="">
                            <option value="{{$Booking['roomName'] ?? ''}}">{{$Booking['roomName'] ?? 'Select Room Type'}}</option>
                            <option value="Premier Suite">Premier Suite</option>
                            <option value="Executive Suite">Executive Suite</option>
                            <option value="Deluxe Queen">Deluxe Queen</option>
                            <option value="Deluxe Twin">Deluxe Twin</option>
                        </select>
                    </div>
                    <div class="col-md-6  col-sm-12">
                        <label>Number of Room</label> <select aria-required="true" class="form-control" name="NumberOfRooms" required ="">
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
                            <option value="5+">
                                5+
                            </option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label>Number of Person</label> 
                        
                        <select aria-required="true" class="form-control" name="NumberOfPerson"  required="">
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
                            <option value="8+">
                                8+
                            </option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-default book-now hvr-shutter-in-horizontal">Book Now</button>
            </div>
        </div>
    </div><!-- END / CONTENT -->
</form>
</div>
</div>
</div>
</div>
</div>
@endsection