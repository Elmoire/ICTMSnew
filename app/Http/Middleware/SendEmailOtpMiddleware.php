<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendLoginOtp;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class SendEmailOtpMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('post') && $request->routeIs('login')) {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                // Generate a random OTP
                $otp = rand(100000, 999999);

                // Store OTP in session
                Session::put('login_otp', $otp);
                Session::put('login_user_id', $user->id);

                // Send OTP via email
                Mail::to($user->email)->send(new SendLoginOtp($otp));

                // Redirect to OTP verification form
                return redirect()->route('verify.otp');
            }
        }

        return $next($request);
    }
}
