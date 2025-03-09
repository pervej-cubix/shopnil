<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\About;
use App\Models\CompanyInfo;
use App\Models\MetingEvent;
use App\Models\Restaurant;
use App\Models\SpecialOffer;
use App\Models\PhotoGallery;
use App\Models\Room;
use App\Models\VideoGallery;
use App\Models\Banner;
class FrontViewController extends Controller
{
    public function home()
    {
        $slide = Slide::get();
        $about = About::first();
        $contact = CompanyInfo::first();
        $rooms = Room::get();
        return view('Frontend.home',["Slide"=>$slide, "About"=>$about, "Contact"=>$contact, "Rooms"=>$rooms]);
    }

    public function slide()
    {
        $slide = Slide::get();
        return view('component.slide', ["Slide"=>$slide]);
    }
    public function rooms()
    {
         $rooms = Room::get();
         $banner = Banner::first();
         $gallery = PhotoGallery::get();
        return view('Frontend.rooms_suites',[
            "Rooms"=>$rooms, "Banner"=>$banner,
            "Gallery" =>$gallery, 
            ]
        );
    }

    public function meetingsEvents()
    {
        $banner = Banner::first();
        $metingEvent = MetingEvent::get();
        return view('Frontend.meeting_event',["Meeting"=>$metingEvent, "Banner"=>$banner]);
    }

    public function restaurant()
    {
        $banner = Banner::first();
        $contact = CompanyInfo::first();
        $restaurant = Restaurant::get();
        return view('Frontend.restaurant', ["Restaurant"=>$restaurant,  "Contact"=>$contact, "Banner"=>$banner]);
    }
    // public function reservation(Request $request)
    // {
        
    //     $banner = Banner::first();
    //     return view('Frontend.reservation',["Banner"=>$banner]);
    // }

        public function reservation(Request $request)
        {
            $banner = Banner::first();

            // Initialize an empty array to hold request data
            $data = [];

            // Check if the request inputs are present and not null, then add to $data array
            if ($request->has('checkin')) {
                $data['checkin'] = $request->input('checkin');
            }

            if ($request->has('checkout')) {
                $data['checkout'] = $request->input('checkout');
            }

            if ($request->has('adult')) {
                $data['adult'] = $request->input('adult');
            }

            if($request->has('roomName')){
                $data['roomName'] = $request->input('roomName');
            }

            // Now, you can use $data to pass it to the view or save it to the database, etc.
            return view('Frontend.reservation', [
                'Banner' => $banner,
                'Booking' => $data,  // Passing data to the view (if needed)
            ]);
        }


    public function specialOffer()
    {
        $banner = Banner::first();
        $offer = SpecialOffer::get();
        return view('Frontend.special_offer',["SpecialOffers" =>$offer, "Banner"=>$banner]);
    }

    public function gallery()
    {
        $banner = Banner::first();
        $gallery = PhotoGallery::get();
        $VideoGallery = VideoGallery::get();
        return view('Frontend.gallery', ["Gallery" =>$gallery, 'VideoGallery'=>$VideoGallery, "Banner"=>$banner]);
    }

    public function contact()
    {
        $banner = Banner::first();
        $contact = CompanyInfo::first();
        return view('Frontend.contact',["Contact" =>$contact, "Banner"=>$banner]);
    }
}