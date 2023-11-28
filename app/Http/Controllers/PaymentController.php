<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\OnlinepaymentNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    public function userList()
    {
        $user = User::all();
        return response()->json([
                'user' => $user
            ]);
    }
    public function getuser(Request $request)
    {   
        $credentials = $request->only('email', 'password');

        // Retrieve the user from the database
        $user = User::where('email', $credentials['email'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {   
            return response()->json([
                'user' => $user,
            ]);
         }
         return response()->json([
            'message' => 'Unable To access Login',
        ]);
    }
    public function payment(Request $request)
    {
        function generateId(){
            $number = mt_rand(100000,9999999);

            if(idNumberExist($number)){
                return generateId();
            }
            return $number;
        }
        function idNumberExist($number){
            return Transaction::where('transaction_id',$number)->exists();
        }
        $genID = generateId();

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {   

            $user->amount -= (int)$request->total;
            $user->save();

            $transaction = new Transaction;
            $transaction->transaction_id = $genID;
            $transaction->transfer_user_id = $user->id;
            $transaction->amount = (int)$request->total;
            $transaction->transaction_type = 'Online Payment';
            $transaction->save();

            Notification::send($user,new OnlinepaymentNotification($transaction));
            return response()->json([
                'user' => 'Transaction is successfully',
            ]);
         }
         return response()->json([
            'message' => 'Invalid credentials',
        ]);

    }
}
