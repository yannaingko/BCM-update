<?php

namespace App\Http\Livewire;

use App\Models\Chatmessage;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use App\Models\User;
use App\Notifications\MessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

class ChatMessageComponent extends Component
{
    public function send()
    {
        $message = new Chatmessage;
        $message->sender_id = auth()->user()->id;
        $message->receiver_id = request()->receiver_id;
        $message->message = request()->message;
        $message->save();

        $receiver = User::where('id',request()->receiver_id)->first();
        if($receiver->current == 0)
        {
            Notification::send($receiver, new MessageNotification($message));
        }
        return response()->json(['success' => true]);
    }

    public function getMessage()
    {
        $senderId = auth()->user()->id;
        $receiverId = request()->receiver_id;

        $receiver = User::where('id',$receiverId)->first();

        // make markasread to the click user messages as read
        $user = auth()->user();
        // Define the filters for the notifications
        $filters = [
            ['data->type', '=', 'message'], // Filter by data 'type': 'message'
            ['data->sender', '=', request()->receiver_id], // Filter by data 'sender' is request()->receiver_id
        ];
        // Retrieve the matching unread notifications
        $unreadNotifications = $user->unreadNotifications()->where($filters)->get();
        // Mark the matching notifications as read
        $unreadNotifications->markAsRead();
        // end here
        $messages = Chatmessage::where(function($query) use ($senderId,$receiverId){
            $query->where('sender_id',$senderId)->where('receiver_id',$receiverId);
        })->orWHere(function ($query) use ($senderId,$receiverId){
            $query->where('sender_id',$receiverId)->where('receiver_id',$senderId);
        })->orderBy('created_at','ASC')->get();

        return response()->json([
            'messages'=> $messages,
            'receiver' => $receiver,
        ]);
    }  
    
    public function render()
    {
        if(auth()->user()){
            $messagenoti = auth()->user()->unreadNotifications->filter(function ($notification) {
                return $notification->data['type'] === 'message';
            });
            $users = User::whereNotIn('id', [auth()->user()->id])->get();

            // foreach ($users as $otherUser) {
            //     // Display user details
            //     // Get the message count for each user
            //     $messageCount = DB::table('notifications')
            //         ->where('notifiable_id', auth()->user()->id)
            //         ->where('notifiable_type', get_class($otherUser))
            //         ->where('data->type', 'message')
            //         ->where('read_at', null)
            //         ->where('data->sender', $otherUser->name)
            //         ->count();
            
            //     // Display the message count for the current user
            //     if(!$messageCount == 0 ){
            //         echo "<p>{$otherUser->name}: {$messageCount}</p>";
            //     }
            // }   
            return view('livewire.chat-message-component',[
                'message' => $messagenoti,
                'users' => $users,
            ]);

        }
        return view('livewire.chat-message-component');
    }
}
