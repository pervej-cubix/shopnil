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
            //==== Fetch Countries, RoomType data =====

            $apiUrl = env('API_URL');
            $countryUrl = "$apiUrl/countrysList";
            $roomTypesUrl = "$apiUrl/roomTypes";
            $settingsUrl = "$apiUrl/settings";
        
            $chCurl = curl_init();
            // Set cURL options
            curl_setopt($chCurl, CURLOPT_URL, $settingsUrl);
            curl_setopt($chCurl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chCurl, CURLOPT_HTTPHEADER, [
                'Accept: application/json',

            ]);
        
            $settingsResponse = curl_exec($chCurl);
            if (curl_errno($chCurl)) {
                echo 'cURL error: ' . curl_error($chCurl);
                curl_close($chCurl);
                exit;
            }
        
            curl_close($chCurl);
            $settingsData = json_decode($settingsResponse, true);
            $token_rules=explode('#', base64_decode($settingsData['data']['rules_for_keys']));
            
            $key=md5($token_rules[0].date("Y-m-d"));
            $property = env("PROPERTY");
            $chCountry = curl_init();

            curl_setopt($chCountry, CURLOPT_URL, $countryUrl);
            curl_setopt($chCountry, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chCountry, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: ' . $key,  
                'Property: ' . $property
            ]);
            
            $countryResponse = curl_exec($chCountry);
        
            if(curl_errno($chCountry)) {
                // Handle the error (for example, log the error)
                curl_close($chCountry);
                return view('web.pages.bookNow')->with('error', 'Error fetching countries: ' . curl_error($chCountry));
            }
            curl_close($chCountry);
        
            $chRoomTypes = curl_init();
            
            curl_setopt($chRoomTypes, CURLOPT_URL, $roomTypesUrl);
            curl_setopt($chRoomTypes, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chRoomTypes, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: ' .$key, 
                'Property: ' . $property
            ]);
            $roomTypesResponse = curl_exec($chRoomTypes);
        
            // Handle cURL errors for room types request
            if(curl_errno($chRoomTypes)) {
                // Handle the error (for example, log the error)
                curl_close($chRoomTypes);
                return view('web.pages.bookNow')->with('error', 'Error fetching room types: ' . curl_error($chRoomTypes));
            }
            curl_close($chRoomTypes);
        
            // Decode the JSON responses to arrays
            $countries = json_decode($countryResponse, true);
            $roomTypes = json_decode($roomTypesResponse, true);
            $countrylist= $countries['data'];
            $roomType= $roomTypes['data'];

            // Now, you can use $data to pass it to the view or save it to the database, etc.
            return view('Frontend.reservation', [
                'Banner' => $banner,
                'Booking' => $data,
                'roomTypes' => $roomType, 
                'countries' => $countrylist
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