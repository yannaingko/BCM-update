<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;

class HomeComponent extends Component
{
    public $phone;
    public $contact;
    public $phoneNub;
    public $amount;    

    public function markasreadall()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return back();
    }
    public function markasread($id)
    {
        $notifications = auth()->user()->unreadNotifications
        ->reject(function ($notification) {
            return $notification->data['type'] === 'message';
        })->count();     

        $noti = auth()->user()->unreadNotifications->find($id);
        $noti->markAsRead();

        return response()->json(['data' => $notifications]);
    }
    public function registerPhone()
    {
        function generateId(){
            $number = mt_rand(0000001,9999999);

            if(idNumberExist($number)){
                return generateId();
            }
            return $number;
        }
        function idNumberExist($number){
            return User::where('customer_id',$number)->exists();
        }
        $genID = generateId();

        $user = User::where('id',auth()->user()->id)->first();
        $user->customer_id = $genID;
        $user->phone = $this->phone;
        $user->save();

        return redirect(route('home'));
    }

    public function render()
    {   
        if(auth()->user()){
            // fetch all unread noti except type = message
            $notifications = auth()->user()->unreadNotifications
            ->reject(function ($notification) {
                return $notification->data['type'] === 'message';
            });            
            // dd($notifications);
            // fetch all unread noti only type = message
            $messagenoti = auth()->user()->unreadNotifications->filter(function ($notification) {
                return $notification->data['type'] === 'message';
            });

            $history = Transaction::all();
            return view('livewire.home-component',[
                'notifications' => $notifications,
                'history' => $history,
                'message' => $messagenoti,
            ]);
        }

        return view('livewire.home-component');
    }
}
