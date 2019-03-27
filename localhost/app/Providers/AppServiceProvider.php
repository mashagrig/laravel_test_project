<?php

namespace App\Providers;

use App\Dress;
use App\Equipment;
use App\EquipmentGym;
use App\Gym;
use App\Http\ViewComposers\GymComposer;
use App\Observers\DressObservers;
use App\Observers\RooleObservers;
use App\Roole;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    //Провайдер - класс реализует функциональность ядра фреймворка
    public function boot()
    {
        // Можно объявлять отдельно, а можно в одном массиве
//        View::share('titleMain', 'Фитнес-клуб "СПОРТ"');
//        View::share('titleGym', ' - Тренажерные залы"');
//        View::share('titleEquipment', ' - Оборудование"');

        // алиасы со значениями - теперь глобальные переменные
        View::share([
            'titleMain' => 'Фитнес-клуб "СПОРТ"',
            'titleGym' => ' - Тренажерные залы"',
            'titleEquipment' => ' - Оборудование"',
           // 'contr' => action('GymController@index'),
            //"gyms_all" => Gym::all(),
            "equipment" => Equipment::all(),
            "gym" => Gym::all()


            ]);

        View::composers([
           //GymComposer::class => "*"
           GymComposer::class => "gym.index"


        ]);

        //для регистрации обработчика-наблюдателя одного конкретного события, произошедшего с данными модели
//        Roole::created(function (Roole $obj){
//            echo $obj;
//        });
        //регистрируем набор обработчиков-наблюдателей событий модели ()
     //   Roole::observe(RooleObservers::class);


     //   Dress::observe(DressObservers::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
