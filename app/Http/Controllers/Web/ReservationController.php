<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ReservationMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\MailSetting;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\ReservationDetails;

class ReservationController extends Controller
{
    public function reservationMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'in:MR.,MRS.,MS.,MR. & MRS.,DR.,NOT APPLICABLE'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:500'],
            'country' => ['required', 'string', 'max:500'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits_between:6,15'], 
            'checkin' => ['required', 'date', 'after_or_equal:today'], 
            'checkout' => ['required', 'date', 'after:checkin'],
            'room_type' => ['required', 'string', 'max:500'],
            'room_no' => ['required', 'integer', 'min:1'], 
            'adult_no' => ['required', 'integer', 'min:1'], 
            'child_no' => ['nullable', 'integer', 'min:0'], 
            'requirements' => ['nullable', 'string', 'max:1000'], 
        ]);        


        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // Unprocessable Entity status code
        }

        // Retrieve validated data
        $data = $request->all();

        $reservationDetail = ReservationDetails::create($data);

        $toMail = MailSetting::first()->mail_to;
        
        // Send the email
        Mail::to("mdpervejhossain0@gmail.com")
            ->send(new ReservationMail($data));

        return redirect()->back()->with('message','Reservation booking success');
    }

    public function reservationApi(Request $request)
    {
        $apiUrl = env('API_URL');

        $auth_key =  env("AUTHORIZATION_KEY");
        $token_rules=explode('#', base64_decode($auth_key));      
        $key=md5($token_rules[0].date("Y-m-d")); 
        $property_uuid=env("PROPERTY_UUID"); 
        $checkinDate = Carbon::parse($request->input('checkin'));
        $checkoutDate = Carbon::parse($request->input('checkout'));

        $dayCount = $checkinDate->diffInDays($checkoutDate);

        //     $formData = $request->all();

        $data = [
            'checkin_date' => $request->checkin,
            'checkout_date' => $request->checkout,
            'room_type' => $request->roomtype,
            'pax_in' => $request->adult_no,
            'number_of_room' => $request->room_no ?? 1,
            'child_in' => $request->child_no,
            'country' => $request->country,
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'guest_remarks' => $request->requirements??'N/A',
            // static property
            'day_count'  => $dayCount,
            'reservation_mode' => 1,
            'currency_type' => 1,
            'conversion_rate' => 1,
            'guest_source_id' => 1,
            'reference_id' => 29,
            'reservation_status' => 1,
        ];

        // $data = [
        //     'checkin_date' => $request->input('checkin'),
        //     'checkout_date' => $request->input('checkout'),
        //     'room_type' => $request->input('roomtype'),
        //     'pax_in' => $request->input('adult_no'),
        //     'child_in' => $request->input('child_no'),
        //     'country' => $request->input('country'),
        //     'title' => $request->input('title'),
        //     'first_name' => $request->input('first_name'),
        //     'last_name' => $request->input('last_name'),
        //     'email' => $request->input('email'),
        //     'phone' => $request->input('phone'),
        //     'address' => $request->input('address'),
        //     'guest_remarks' => $request->input('requirements')??'N/A',
        //     // static property
        //     'day_count'  => $dayCount,
        //     'reservation_mode' => 1,
        //     'currency_type' => 1,
        //     'conversion_rate' => 1,
        //     'guest_source_id' => 1,
        //     'reference_id' => 29,
        //     'reservation_status' => 2,
        // ];
        
        $apiUrl = env('API_URL');
        $server_url = "$apiUrl/store_reservation";
        
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $server_url);            
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        
        curl_setopt($ch, CURLOPT_POST, true);                  
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  

        // Set cURL options with proper header format
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: ' . $key,  
            'Property: ' . $property_uuid
        ]);

        // Execute cURL request
        $response = curl_exec($ch);

        // Check if cURL execution was successful
        if($response === false) {
            $errorMessage = curl_error($ch);
            curl_close($ch);  
            return back()->with([
                'messages' => 'cURL Error: ' . $errorMessage,
                'status' => 'error'
            ]);
        }

        curl_close($ch);

        // Decode the response
        $response = json_decode($response);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->with([
                'messages' => 'Invalid JSON response from API',
                'status' => 'error'
            ]);
        }

        // Check if the response contains the expected status
        if (isset($response->status) && $response->status == 'success') {
            $successMessage = $response;

            return response()->json([
                'messages' => $successMessage->message,
                'status' => $successMessage->status,
                'reseponse' => $successMessage
            ]);
        } else {
            $errorMessage = isset($response->fields) ? $response->fields : 'Unknown error';
            response()->json([
                'messages' => $errorMessage->message ?? 'Unknown error',
                'status' => $response->status ?? 'error'
            ]);
            } 
    }

    public function reservationCheck(Request $request){
        $apiUrl = env('API_URL');      
        $settingsUrl = "$apiUrl/settings";
        
        $auth_key =  env("AUTHORIZATION_KEY");
        $token_rules=explode('#', base64_decode($auth_key));      
        $key=md5($token_rules[0].date("Y-m-d"));
        $property_uuid = env("PROPERTY_UUID");
        
        $availabilityCheckUrl = "$apiUrl/check_availabilty";
        $ch = curl_init($availabilityCheckUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        
        $data = [
            'checkIn2' => $request->checkin,
            'checkOut2' => $request->checkout,
            'roomTypeId' => $request->roomtype,
            'room_quantity' => 1,
            "editRoomList" => []
        ];

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
       
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: ' . $key ,
            'Property: ' . $property_uuid
        ]);
        $availabilityCheckResponse = curl_exec($ch);
     
        // Check for errors 
        if (curl_errno($ch)) {
            $error = curl_error($availabilityCheckResponse);
            curl_close($ch);
            return response()->json(['error' => $error], 500);
        }

        // Close cURL
        curl_close($ch);

        // Decode and return response
        $responseData = json_decode($availabilityCheckResponse, true);
        return response()->json($responseData);
    }

    public function contactMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'sendEmail' => ['required'],
            'sendMessage' => ['required'],
           
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // Unprocessable Entity status code
        }

        // Retrieve validated data
        $data = $request->all();
        $toMail = MailSetting::first()->mail_to;
        Mail::to($toMail)
        ->send(new ContactMail($data));

        return redirect()->back()->with('message','Contact  success');
    }
    
}
