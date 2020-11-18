<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Support\Facades\App;

class ResetPassword extends ResetPasswordNotification
{
    use Queueable;
    public $token;

    /**
     * Create a new notification instance.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
        App::setLocale('fa');
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
                    ->subject('ریست پسورد')
                    ->line('شما این ایمیل را دریافت کردید بخاطر اینکه از ما درخواست بازیابی گذرواژه برای حساب کاربری برای خود کرده اید .

')
                    ->action('ریست پسورد', url('ertebat/password/reset', $this->token))
                    ->line('اگر شما درخواست ریست پسورد نکردید پس لازم نیست هیچ اقدامی انجام بدید')
                    ->line('با تشکر');
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
