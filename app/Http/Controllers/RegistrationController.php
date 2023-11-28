<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $verificationCode = mt_rand(100000, 999999);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'verification_code' => $verificationCode,
        ]);

        Mail::send([], [], function ($message) use ($verificationCode, $user) {
            $message->to($user->email)
                ->subject('Verify Your Email')
                ->setBody(view('verification', compact('verificationCode', 'user'))->render(), 'text/html');
        });
        
        return view('verification',[
            'email' => $user->email,
        ]);
    }
}
