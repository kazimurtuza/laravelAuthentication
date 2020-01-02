<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\user;

class sendemail extends Notification
{
    use Queueable;
    public $myuserdata;
    public $productdata;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $user,$data)
    {
       $this->myuserdata=$user;
       $this->productdata=$data;
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
        return (new MailMessage)
       
                    ->subject('make your web')
                    ->line('id ' .$this->myuserdata->id)
                    ->line('welcome  ' .$this->myuserdata->email)
                    ->line('yourname  ' .$this->myuserdata->username)
                    ->line('you  order  ')
                    ->line('product name : '.$this->productdata['prodact_name'])
                    ->line('price        : '.$this->productdata['price'])
                    ->line('discount     : '.$this->productdata['discount'])
                    ->action('visit our site', route('home'))
                    ->line('Thank you for using our application!');
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
