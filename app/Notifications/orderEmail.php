<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class orderEmail extends Notification
{
    use Queueable;

    public $userdetail;
    public $orderdetail;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userinfo,$orderdata)
    {
        $this->userdetail=$userinfo;
        $this->orderdetail=$orderdata;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->view('email2.order',['userdata'=>$this->userdetail,'orderdata'=>$this->orderdetail]);
                   
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
