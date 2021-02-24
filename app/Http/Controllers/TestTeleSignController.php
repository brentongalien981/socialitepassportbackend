<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use telesign\sdk\messaging\MessagingClient;
use function telesign\sdk\util\randomWithNDigits;

class TestTeleSignController extends Controller
{
    public function verifyOtp(Request $request) {
        $otp = intval($request->otp);

        $user = User::where('name', $request->name)->first();

        if (!isset($user)) { 
            return ['customError' => 'user does not exist bruh.'];
        }

        if ($user->otp === $otp) {
            return [
                'comment' => 'SUCCESS! You are now verified!',
                'passed-otp' => $otp,
                'user-otp' => $user->otp,
                'user' => $user
            ];
        }

        return [
            'comment' => 'ERROR! You are NOT verified.',
            'passed-otp' => $otp,
            'user-otp' => $user->otp
        ];
    }



    public function getOtp(Request $request) {
        
        $customer_id = env('TELESIGN_CID');
        $api_key = env('TELESIGN_AK');
        $phone_number = "14164604026";

        $verify_code = randomWithNDigits(5);
        $message = "Your code is $verify_code";
        $message_type = "OTP";


        // Set user's otp field.
        $user = User::where('name', $request->name)->first();
        if (!isset($user)) { 
            return ['customError' => 'user does not exist bruh.'];
        }
        $user->otp = $verify_code;
        $user->save();



        // Send message.
        $messaging = new MessagingClient($customer_id, $api_key);
        $response = $messaging->message($phone_number, $message, $message_type);
        return [
            'comment' => 'OTP sent',
            'OTP' => $verify_code,
            'the-response' => $response
        ];

    }



    public function test() {
        
        $customer_id = env('TELESIGN_CID');
        $api_key = env('TELESIGN_AK');
        $phone_number = "14164604026";
        $message = "Here we go again!";
        $message_type = "ARN";
        $messaging = new MessagingClient($customer_id, $api_key);
        $response = $messaging->message($phone_number, $message, $message_type);

        return [
            'comment' => 'In CLASS: TestTeleSignController, METHOD: test()',
            'telesign-response' => $response
        ];
        
    }
}
