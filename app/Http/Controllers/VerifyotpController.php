<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\EmailVerification;
use Mail;


class VerifyotpController extends Controller
{
    public function test()
    {
        return view('livewire.mailVerification');
    }
    public function verification($id)
    {
        $user = User::where('id',$id)->first();
        if(!$user || $user->is_verified == 1){
            return redirect('/');
        }
        $email = $user->email;

        $this->sendOtp($user);//OTP SEND / Otherwise create otp code and save in database

        return view('livewire.verification',compact('email'));
    }

    public function sendOtp($user)
    {
        $otp = rand(100000,999999);
        $time = time();

        EmailVerification::updateOrCreate(
            ['email' => $user->email],
            [
            'email' => $user->email,
            'otp' => $otp,
            'created_at' => $time
            ]
        );

        $data['email'] = $user->email;
        $data['title'] = 'Mail Verification';

        $data['body'] = $otp;

        Mail::send('livewire.mailVerification',['data'=>$data],function($message) use ($data){
            $message->to($data['email'])->subject($data['title']);
        });
    }

    public function verifiedOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('otp',$request->otp)->first();
        if(!$otpData){
            return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }
        else{

            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
                User::where('id',$user->id)->update([
                    'is_verified' => 1,
                    'email_verified_at' => now(),
                ]);
                return response()->json(['success' => true,'msg'=> 'Mail has been verified']);
            }
            else{
                return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
            }

        }
    }

    public function resendOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('email',$request->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
            return response()->json(['success' => false,'msg'=> 'Please try after some time']);
        }
        else{

            $this->sendOtp($user);//OTP SEND
            return response()->json(['success' => true,'msg'=> 'OTP has been sent']);
        }

    }


    public function loggin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $userData = User::where('email',$request->email)->first();
        
        if($userData && $userData->is_verified == 0){
            $this->sendOtp($userData);
            return redirect("/verification/".$userData->id);
        }
        else if(Auth::attempt($credentials)) {
            $user = User::where('id',auth()->user()->id)->first();
            $user->current = 1;
            $user->save();
            // Authentication successful
            return redirect()->intended('/');
        } else {
            // Authentication failed
            return redirect()->back()->withInput()->withErrors(['message' => 'Username & Password is incorrect']);
        }
    }    
    
    public function logout()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $user->current = 0;
        $user->last_seen = now();
        $user->save();

        Auth::logout();
        return redirect('/');
    }

}
