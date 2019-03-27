<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    //отправляеем письмо
    protected $redirectTo = '/password/send';
    //protected $redirectTo = '/password/verification';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'captcha' => ['required', 'captcha']
        ], [
            'name.required' => 'Укажите имя',
            'name.string' => 'Должна быть строка',
            'name.max' => 'В поле должно быть указано не более 255 символов',
            'email.required' => 'Укажите e-mail',
            'email.string' => 'Должна быть строка',
            'email.email' => 'Введенные данные не являются e-mail адресом',
            'email.max' => 'В поле должно быть указано не более 255 символов',
            'email.unique' => 'e-mail адрес должен быть уникальный',
            'password.required' => 'Укажите',
            'password.string' => 'Должна быть строка',
            'password.min' => 'В поле должно быть указано не менее 6 символов',
            'password.confirmed' => 'Введенный пароль не совпадает с указанным',
            'captcha.required' => 'captcha not required',
            'captcha.captcha' => 'captcha - символы с картинки введены неверно'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function refreshCaptcha()

    {
        return response()->json(['captcha_src'=> captcha_src('flat')]);
    }
}
