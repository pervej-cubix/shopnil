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
        $validator = Validator::make($request->all(), [
            'firstName' => ['required'],
            'lastName' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'senderEmail' => ['required', 'email'],
            'city' => ['required'],
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date'],
            'roomType' => ['required'],
            'NumberOfRooms' => ['required', 'integer'],
            'NumberOfPerson' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // Unprocessable Entity status code
        }

        // Retrieve validated data
        $data = $request->all();
        $toMail = MailSetting::first()->mail_to;
        


        // Send the email
        Mail::to($toMail)
            ->send(new ReservationMail($data));

        return redirect()->back()->with('message','Reservation booking success');
       
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
