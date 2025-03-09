@extends('layout.app')
@section('title') Rooms @endsection
@section('content')

<style>
.item-price {
    width: 25% !important;
}

.price-inner {
    width: 100%;
    padding: 0px;
}

.price-row {
    display: flex;
    justify-content: space-between;
    text-align: center;
    align-items: center;
    width: 100%;
}

.price-row h3 {
    margin: 5px 0px;
    font-size: 19px !important;
}

.discount-section {
    text-align: center;
    margin: 10px 0px;

}

.discount-section h3 {
    font-size: 14px !important;
}

.discount-section h5 {
    font-size: 15px !important;
}

.check {
    list-style-type: none;
}

.check button {
    cursor: pointer;
    padding: 10px;
}

@media (max-width: 768px) {
    .item-price {
        width: 100% !important;
    }
}

.room_details_container {
    display: flex;
    width: 100%;
    border: 1px solid red;
}

.room_details_container .room_details_item:nth-child(1) {
    max-width: 30%;

}

.room_details_container .room_details_item:nth-child(2) {
    max-width: 40%;

}

.room_details_container .room_details_item:nth-child(3) {
    max-width: 30%;

}
</style>

@php
$galleryData = [
'Wedding' => [
'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e',
'https://images.unsplash.com/photo-1504203700686-23f0e3e26b48',
'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb',
],
'Birthday' => [
'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb',
'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb',
],
'Corporate Event' =>[
'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e',
'https://images.unsplash.com/photo-1504203700686-23f0e3e26b48',
'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb',
],
];
@endphp

<section class="banner-inner haslayout padding-section parallax-window room" data-position="center 0"
    data-parallax="scroll" data-bleed="100" data-speed="0.2"
    style="background-image: url(' {{ asset('/storage/app/public/' . $Banner->room_banner) }}');">
    <div class="awe-overlay-intro">
        <div class="container">
            <h1>Rooms &amp; Suites</h1>
        </div>
    </div>
</section>

<!--
// Image gallery 
<div class="container">
    <div class="row">
        <div class="col-md-12">
           Left Section (Photos) 
<div class="left">
    @php
    $first = true;
    @endphp
    <ul>
        <h4>Photos</h4>
        @foreach($Gallery as $item)
        @if($first)
        <li>
            <a href="{{ asset('/storage/app/public/' . $item->image) }}" data-lightbox="gallery" data-title="Photo"
                class="image-link gallery-item">
                <img class="g-thumb" src="{{ asset('/storage/app/public/' . $item->image) }}" alt="Gallery Image"
                    style="width: 300px; height: auto;" />
            </a>
        </li>
        @php $first = false;
        @endphp
        @else
        <li style="display: none;">
            <a href="{{ asset('/storage/app/public/' . $item->image) }}" data-lightbox="gallery" data-title="Photo"
                class="image-link gallery-item">
            </a>
        </li>
        @endif
        @endforeach
    </ul>
</div>
 Right Section (Virtual Tours) 
<div class="col-md-5">
    <div class="right">
        <ul>
            <h4>Photos</h4>
        </ul>
    </div>
</div>
</div>
</div>
</div> -->

<div class="container">
    <div class="widget-rooms-list">
        <div class="row">
            <div class="col-md-12">
                @foreach($Rooms as $item)
                <form action="{{route('reservation')}}" method="get">
                    <div class="rooms-item">
                        <div class="item-photo hover14">
                            <a href="#" data-background="{{ asset('/storage/app/public/' . $item->image) }}"
                                style="background-image: url('{{ asset('/storage/app/public/' . $item->image) }}')"></a>
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
                                @php
                                $exchangeRate = 0.0091; // Example: 1 BDT = 0.0091 USDT (Update as needed)
                                $usdt = round($item->price * $exchangeRate, 2);
                                @endphp
                                <div class="price-row" style="text-decoration: line-through;">
                                    <h3 style="font-size: 16px;">{{ $usdt }}<span
                                            style="font-size: 15px; font-weight: 600;">
                                            &nbsp;USD</span></h3>
                                    <h3>{{ $item->price }} <span style="font-size: 15px; font-weight: 600;">BDT</span>
                                    </h3>
                                </div>
                                <div class="discount-section">
                                    <h3>%</h3>
                                    <h5>Discount Amount</h5>
                                </div>
                                <div class="price-row">
                                    <h3>{{ $usdt }}<span style="font-size: 16px; font-weight: 600;">
                                            &nbsp;USD</span>
                                    </h3>
                                    <h3>{{ $item->price }} <span style="font-size: 16px; font-weight: 600;">BDT</span>
                                    </h3>
                                </div>
                                <h5 style="margin-top: 10px;">Per Night</h5>
                                <li class="check">
                                    <button name="index-reservation" class="hvr-shutter-in-horizontal">
                                        <h2>Book Now</h2>
                                    </button>
                                </li>
                            </div>
                        </div>

                    </div>
                    <!-- .rooms-item ends -->
                </form>
                @endforeach
            </div>
            <!-- .widget-rooms-list ends -->
        </div>
    </div>
</div>
@endsection