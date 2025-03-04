@extends('layout.app')
@section('title') Gallery @endsection
@section('content')

<section class="banner-inner haslayout padding-section parallax-window room" data-position="center 0" data-parallax="scroll" data-bleed="100" data-speed="0.2" style="background-image: url(' {{ asset('/storage/app/public/' . $Banner->gallery_banner) }}');">
    <div class="awe-overlay-intro">
        <div class="container">
			<h1>Gallery</h1>
        </div>
    </div>
</section>

<!-- Gallery Content Section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="gallery-section">
                <!-- Left Section (Photos) -->
                <div class="col-md-7">
                    <div class="left">
                        <ul>
                            <h4>Photos</h4>
                            <!-- List of gallery images -->
                            @foreach($Gallery as $item)
                            <li>
                                <a href="{{ asset('/storage/app/public/' . $item->image) }}" data-lightbox="gallery" data-title="Photo " class="image-link gallery-item">
                                    <img class="g-thumb" src="{{ asset('/storage/app/public/' . $item->image) }}" alt="Gallery Image "/>   
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Right Section (Virtual Tours) -->
                <div class="col-md-5">
                    <div class="right">
                        <ul>
                            <h4>Virtual Tours</h4>
                            @foreach($VideoGallery as $item)
                            <li>
                                <a href="https://www.youtube.com/watch?v={{$item->watch_id}}" target="_blank" data-fancybox="gallery" class="video-link" title="{{$item->title}}">
                                    <img class="g-thumb" src="{{ asset('/storage/app/public/' . $item->thumbnail) }}" alt="{{$item->title}}" />  
                                </a>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
