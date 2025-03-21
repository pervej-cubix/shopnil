<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ReservationMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\MailSetting;
use Illuminate\Support\Facades\Validator;
class ReservationController extends Controller
{
    public function reservationMail(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     // Reservation Details
        //     'checkin'       => ['required', 'date'],
        //     'checkout'      => ['required', 'date', 'after_or_equal:checkin'],
        //     'roomtype'      => ['required'],
        //     'room_no'       => ['required', 'integer', 'min:1', 'max:10'],
        //     'adult_no'      => ['required', 'integer', 'min:1', 'max:40'],
        //     'child_no'      => ['nullable', 'integer', 'min:0', 'max:40'],
        
        //     // Personal Details
        //     'title'         => ['required'],
        //     'first_name'    => ['required', 'string'],
        //     'last_name'     => ['required', 'string'],
        //     'email'         => ['required', 'email'],
        //     'phone'         => ['required', 'string'],
        //     'country'       => ['required'],
        //     'address'       => ['required', 'string'],
        
        //     // Optional
        //     'requirements'  => ['nullable', 'string'],
        // ]);        

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // Unprocessable Entity status code
        }

        dd($data);
        return;
        // count days
        $checkinDate = Carbon::parse($request->input('checkin'));
        $checkoutDate = Carbon::parse($request->input('checkout'));
        $dayCount = $checkinDate->diffInDays($checkoutDate);

        // Retrieve validated data
        $data = $request->all();
        $data = array_merge($data, [
            'day_count'         => $dayCount,
            'reservation_mode'  => 1,
            'currency_type'     => 1,
            'conversion_rate'   => 1,
            'guest_source_id'   => 1,
            'reference_id'      => 29,
            'reservation_status'=> 1,
            'guest_remarks'     => $request->requirements ?? 'N/A',
        ]);

        $toMail = MailSetting::first()->mail_to;
        


        // Send the email
        Mail::to($toMail)
            ->send(new ReservationMail($data));

        return redirect()->back()->with('message','Reservation booking success');
       
    }

    public function reservationCheck(Request $request){
        $apiUrl = env('API_URL');      
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
            'Authorization: ' . $key 
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
