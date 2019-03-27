<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Notifications\MyPasswordReset;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

//    protected function rules()
//    {
//        return [
//            'token' => 'required',
//            'email' => 'required|email',
//            'password' => 'required|confirmed|min:6',
//        ];
//    }


    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
   // protected $redirectTo = '/home';

    ////POST запрос для отправки email письма пользователю для сброса пароля
    protected $redirectTo = '/password/email';//Forgot  -  sendResetLinkEmail
    //все send методы будут от Fogot
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //Переопределяем методы из тррейта
    protected function validationErrorMessages()
    {
        return [
            'email.required' => 'Укажите адресс электронной почты'
        ];
    }

    protected function sendResetResponse(Request $request, $response)
    {
        return redirect($this->redirectPath())
            ->with('status', "Сброс пароля упешно выполнен");
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email.email' => "Указанный адрес электронной почты в списке отсутствует resetContr"]);
    }


}
