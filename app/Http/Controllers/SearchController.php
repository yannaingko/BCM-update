<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Notifications\ReceiveNotification;
use App\Notifications\TransferNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
{
    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     // Perform the search query and return the results
    // }
    public function index()
    {
        return view('search.search');
    }

    public function transaction()
    {
        function generateId(){
            $number = mt_rand(0000001,9999999);

            if(idNumberExist($number)){
                return generateId();
            }
            return $number;
        }
        function idNumberExist($number){
            return Transaction::where('transaction_id',$number)->exists();
        }
        $genID = generateId();

        $amount = (int) request()->tot_amount;
        $sender = User::where('id',auth()->user()->id)->get()->first();
        $receiver = User::where('phone', request()->phone)->get()->first();

        $fee = 0 ;
        switch($amount){
            case $amount < 10000:
                $fee = 300;
            break;
            case $amount >= 10001 && $amount <= 25000:
                $fee = 600;
            break;
            case $amount >=25001 && $amount  <= 50000:
                $fee =  800;
            break;
            case $amount >= 50001  && $amount  <= 100000:
                $fee =  1200;
            break;
            case $amount >= 100001 && $amount  <= 150000:
                $fee =  1600;
            break;
            case $amount >= 150001 && $amount  <= 200000:
                $fee =  2000;
            break;
            case $amount >= 200001 && $amount  <= 500000:
                $fee =  4000;
            break;
            case $amount >= 500001 && $amount  <= 1000000:
                $fee =  8000;
            break;
            default:
                $fee = 10000;
        }

        if($sender->id === $receiver->id){
            return back()->with('message','Sender and Receiver should not Same person');
        }    
        else{
            $transaction = new Transaction;
            $transaction->transaction_id = $genID;
            $transaction->transfer_user_id = $sender->id;
            $transaction->amount = $amount;
            $transaction->receiver_user_id = $receiver->id;
            $transaction->transaction_type = 'Local Transaction';
            $transaction->save();
    
            // sender will reduce amount
            if($receiver->position == 'user')
            {                
                $sender->amount -= $amount;
                $sender->save();
                // receiver will add amount
                $receiver->amount += $amount;
                $receiver->save();
            }elseif($receiver->position == 'agent')
            {
                $sender->amount -= ($amount + $fee);
                $sender->save();
                // receiver will add amount
                $receiver->amount += ($amount + $fee);
                $receiver->save();

            }     
            // send noti to receiver and sender 
            Notification::send($sender, new TransferNotification($transaction));
            Notification::send($receiver, new ReceiveNotification($transaction));

            return redirect(route('home'))->with('info',"Transaction is Successfully");
        }    

    }

    public function search(Request $request) {
        $searchText = $request->input('searchText');
        /* query the database or any other data source using $searchText */

        $data = User::where('phone', 'LIKE', '%' . $searchText . '%')->get();
        return response()->json(['data' => $data]); 
      }

    public function searchUser(Request $request) {
        $searchText = $request->input('searchText');
        /* query the database or any other data source using $searchText */

        $data = User::where('name', 'LIKE', '%' . $searchText . '%')->where('id', '!=', auth()->user()->id)->get();
        return response()->json(['data' => $data]);
      }

    public function process($id)
    {
        $user = User::where('id',$id)->get()->first();
        Session::put('contact',[
            'id' => $user->id,
            'customer_id' => $user->customer_id,
            'name' => $user->name,
            'amount' => $user->amount,
            'email' => $user->email,
            'phone' => $user->phone,
        ]);
        return response()->json(['data' => $user]);
    }  

    public function getUserBalance()
    {
        $user = auth()->user();
        return response()->json(['balance' => $user->amount]);
    }    
}
