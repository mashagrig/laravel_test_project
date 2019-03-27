<?php

namespace App\Notifications;


use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\ResetPassword;

class MyPasswordReset extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
       // return ['mail'];
        return ['mail'];
    }

//    public function toMail($notifiable)
//    {
//        $name = User::select('name')
//        ->where('email', '=', request()->email)
//        ->get()[0]->name;
//
//
//        return (new MailMessage)
//            ->subject('Сброс пароля')
//            ->greeting("Уважаемый, пользователь, ". $name . "!")
//            ->line('Вы получили это письмо, так как поступил запрос на сброс пароля.')
//            ->action(Lang::getFromJson('Сбросить пароль'), url(config('app.url').route('password.reset', $this->token, false)))
//            ->line('Если Вы получили это письмо по ошибке — просто проигнорируйте его и пароль останется без изменений.')
//            ->line('Спасибо, что используете наш ресурс!')
//            ->from('m-a-grigoreva@yandex.ru', "Маша");
//    }
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $name = User::select('name')
            ->where('email', '=', request()->email)
            ->get()[0]->name;


        return (new MailMessage)
            ->subject(Lang::getFromJson('Сброс пароля'))
            ->greeting(Lang::getFromJson("Уважаемый, пользователь, ". $name . "!"))
            ->line(Lang::getFromJson('Вы получили это письмо, так как поступил запрос на сброс пароля.'))
            ->action(Lang::getFromJson('Сбросить пароль'), url(config('app.url').route('password.reset', $this->token, false)))
            ->line(Lang::getFromJson('Данная ссылка на страницу сброса пароля будет действительной в течении :count минут.', ['count' => config('auth.passwords.users.expire')]))
            ->line(Lang::getFromJson('Если Вы получили это письмо по ошибке — просто проигнорируйте его и пароль останется без изменений.'))
            ->from(Lang::getFromJson('m-a-grigoreva@yandex.ru', "Маша"));
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
