<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 08.02.19
 * Time: 16:29
 */

namespace App\Observers;
use App\Roole;

//наблюдатель за событием в данных модели
//надо зарегистрировать в классе App\Providers\AppServiceProvider в методе boot()
//если все методы вернут false то запись не создастся!!!!
class RooleObservers
{
    public function created(Roole $roole){
        echo 'Observer-created - после сохранения новой записи'.$roole;
       // if($obj) проверка
            return true;
    }
    public function restored(Roole $roole){
        echo 'Observer-restored - после извлечения записи в модель'.$roole;
        //if() проверка
        return true;
    }
}
