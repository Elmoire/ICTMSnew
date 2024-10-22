<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\SendLoginOtp;
use App\Models\User;

class OtpVerificationController extends Controller
{
    public function showVerifyForm()
    {
        return view('auth.verify_otp'); // Ensure 'auth.verify_otp' view exists in your resources/views/auth directory
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required']);

        if ($request->otp == Session::get('login_otp')) {
            Auth::loginUsingId(Session::get('login_user_id'));

            Session::forget('login_otp');
            Session::forget('login_user_id');

            return response()->json(['redirect' => url('/dashboard')]);
        }

        return response()->json(['errors' => ['otp' => ['Invalid OTP.']]], 422);
    }

    public function resendOtp(Request $request)
    {
        $userId = Session::get('login_user_id');
        $user = User::find($userId);

        if ($user) {
            $otp = rand(100000, 999999);
            Session::put('login_otp', $otp);
            Mail::to($user->email)->send(new SendLoginOtp($otp));

            return response()->json(['message' => 'OTP resent successfully!']);
        }

        return response()->json(['message' => 'User not found.'], 404);
    }
}