<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OnlinepaymentNotification extends Notification
{
    use Queueable;
    private $trans;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($trans)
    {
        $this->trans = $trans;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toArray($notifiable)
    {
        return [
            'title' => 'Online Payment',
            'user' => $this->trans->transfer_user_id,
            'amount' => $this->trans->amount,
            'type' => 'online_payment',
        ];
    }
}
