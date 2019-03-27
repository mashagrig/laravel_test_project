<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get/post() -> возвращает МАРШРУТ


//отправка данных методом GET , с параметрами и без параметров!(просто переход также методом GET)


Route::get('/', function () {
    return view('layouts.main');
});
Route::get('home', function () {
    return view('layouts.main');
});
Route::get('login', function () {
    return view('auth.login');
});
Route::get('register', function () {
    return view('auth.register');
});


//Route::get('password.update', function () {
//    return view('auth.passwords.reset');
//});
Route::get('password.reset', function () {
    return view('auth.passwords.reset');
});

Route::get('password/email', function () {
    return view('auth.passwords.email');
});








//Route::get('/home', 'GymControllerFirst@index')->name('home');
//Route::get('/roole', function () {
//    return view('roole');
//});
//Route::get('/roole/{roole}', 'RooleController@show');
Route::get('roole/{roole}', 'RooleController@index');





Route::get('gym', function () {
    return view('gym.input');
});
Route::get('/rel/gym', function () {
    return view('gym.input');
});

//Route::get('/gym/{gym}', 'GymController@index')->name('gym');
Route::get('/rel/gym', 'GymController@index')->name('gym')->middleware("can:manipulate,App\User");
Route::post('/rel/gym', 'GymController@store');//post
Route::put('/rel/gym', 'GymController@store');//PUT

//Route::get('/gym/create', 'GymController@input')->name('gym.create');
Route::get('/rel/gym/input', 'GymController@input');
Route::get('/rel/gym/{id}/edit', 'GymController@input');
Route::get('/rel/gym/{id}/delete', 'GymController@destroy');







Route::get('/', 'GymControllerFirst@index');
Route::get('/home', 'GymControllerFirst@index')->name('home');
Route::get('/{gym}', 'GymControllerFirst@index');

Route::get('/{id}/edit', 'GymControllerFirst@input');
Route::get('/{id}/delete', 'GymControllerFirst@destroy');

//обязательно необходимо зарегить эти маршруты на store post / put для отправки данных формы
Route::post('/', 'GymControllerFirst@store');//post
Route::put('/', 'GymControllerFirst@store');//PUT

Route::get('/upload','UploadController@index')->name('form.file');
Route::post('/upload', 'UploadController@store')->name('upload.file');
Route::post('/delete', 'UploadController@destroy')->name('delete.file');



\Illuminate\Support\Facades\Auth::routes(['verify' => true]);
//создаст набор маршрутов

//отображение формы аутентификации
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//POST запрос аутентификации на сайте
Route::post('login', 'Auth\LoginController@login');

Route::get('/login/success', function () {
    return view('auth.loginSuccess');
});

//POST запрос на выход из системы (логаут)
//Route::post('logout', 'Auth\LoginController@logout');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


//страница с формой Laravel регистрации пользователей
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//POST запрос регистрации на сайте
Route::post('register', 'Auth\RegisterController@register');


////POST запрос для отправки email письма пользователю для сброса пароля
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

//ссылка для сброса пароля (можно размещать в письме)
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');



//POST запрос для сброса старого и установки нового пароля
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//страница с формой для сброса пароля
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');






//просто страница с формой для верификации пароля - регает ссылку с VerifContr после всех успешно выполненных методов и действий
Route::get('/password/verification', function () {
    return view('auth.verifySuccess');
});




// запрос для верификации - регает ссылку с RegisterContr и из шаблоне регистрации!
Route::get('verification.send', function () {
    return view('auth.verify');
});
Route::get('/password/send', 'Auth\VerificationController@send')->name('verification.send');


// запрос для верификации - регает ссылку с RegisterContr и из шаблоне регистрации!
Route::get('verification.resend', function () {
    return view('auth.verify');
});
Route::get('/password/resend', 'Auth\VerificationController@resend')->name('verification.resend');
//страница с формой для верификации пароля
//Route::get('/password/verification', 'Auth\VerificationController@show');
// запрос для верификации
//Route::get('/password/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//Route::get('/password/resend', 'Auth\VerificationController@verify');

















Route::get('/register/refresh_captcha', 'Auth\RegisterController@refreshCaptcha')->name('refresh_captcha');


















/* Именованные маршруты

$gett = Route::get('/', function(){return view('welcome');});

а можно/нужно так

Route::get('/', function(){return view('welcome');})->name('gett');
*/

/*Правила для параметров маршрутов
$gett = Route::get('/', function () {
    return view('welcome');
});
$gett->where('id', 'regular');
$gett->where('regular'); - для люббых параметров



либо

задаем правила соответствия параметров маршрута правилам в RouteServiceProvider
*/

/*
 Route::post('адрес', 'Класс контроллера @ метод')
При вызове - INSERT (на создание новой записи в базе)

 Route::match(['get', 'post'], 'адрес', 'Класс контроллера @ метод')
 Route::any('адрес', 'Класс контроллера @ метод') - для любых методов отправки данных!!!
*/

/* Параметризованные маршруты (обяз/необяз)
 Route::get('/cat/{id}', 'Класс контроллера @ add')
 при переходе по адресу будет вызван метод add(id)

 Route::get('/cat/{id?}', 'Класс контроллера @ add')

  при переходе по адресу будет вызван метод add(id = 1)
 {id?} - необязательный параметр,
  при использовании в меоде его значение может не прийти, поэтому надо задать в методе значение по умолчанию!!!
*/

/* Указание посредников после маршрута, но перед контроллером!!! middleware

Route::get('/', function(){return view('welcome');})->middleware('auth');
*/

/* Создание набора маршрутов (7) всеми методами передачи с испоьзованием всех определенных методов в контроллере

Route::source('адресс без /', 'контроллер', доп парам);
Route::source('адресс без /', 'контроллер', [
                  'only' => ['действия контр, для кот маршр созданы БУДУТ'],
                  'except' => ['действия контр, для кот МАРШРУТЫ созданы НЕ БУДУТ'],
                  'names' => ['действие контр' => 'имя/алиас маршрута', '' => ''],
                  'parameters' => ['адрес без /' => 'параметр (id)']
                ]);





для нескольких (как в RouteServiceProvider этот метод исп для проверки параметров маршрутов)

Route::patterns([
        'страница' => 'контроллер',
        'страница2' => 'контроллер2',
        ...
        ]);
*/





//Auth::routes();

//Route::get('/home', 'GymControllerFirst@index')->name('home');

