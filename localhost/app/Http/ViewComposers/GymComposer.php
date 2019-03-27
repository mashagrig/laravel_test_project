<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 12.02.19
 * Time: 16:40
 */

namespace App\Http\ViewComposers;


use App\Equipment;
use App\EquipmentGym;
use App\Gym;
use Illuminate\View\View;

class GymComposer
{
    public function compose(View $view){

//        $equipment_gym = EquipmentGym::select([
//            'equipment_gym.id as id',//id
//            'equipment_gym.gym_id as gym_id',
//            'equipment_gym.equipment_id as equipment_id',
//            'equipment_gym.updated_at as updated_at',
//            //"gyms.id",
//            "gyms.gym_name as gym_name",
//            "gyms.gym_num as gym_num",
//           // "gyms.created_at",
//            //"gyms.updated_at",
//            //"equipments.id",
//            "equipments.equip_name as equip_name",
//            "equipments.equip_serial_number as equip_serial_number",
//            "equipments.equip_count as equip_count",
//           // "equipments.created_at",
//           // "equipments.updated_at"
//        ])
//            ->join('gyms', 'equipment_gym.gym_id', '=', 'gyms.id', 'inner')
//            ->join('equipments', 'equipment_gym.equipment_id', '=', 'equipments.id', 'inner')
//            // ->orderBy("equipments.id")
//            ->orderBy('equipment_gym.updated_at', 'desc')
//            ->get();


        $eg_first = \DB::table('equipment_gym')
            ->orderBy('equipment_gym.updated_at', 'desc')
            ->first();

        $equipment_gym = EquipmentGym::findOrNew(($eg_first->id) ?? 1, [
            'id',
            'gym_id',
            'equipment_id',
            'updated_at'

        ]);

        $gym = Gym::findOrNew( $equipment_gym->gym_id, [
            'id',
            'gym_name',
            'gym_num'

        ]);//текущая запись в gym



        $equipment = Equipment::findOrNew( $equipment_gym->equipment_id, [
            'id',
            'equip_name',
            'equip_serial_number',
            'equip_count'

        ]);//текущая запись в Equipment



        $view->with([
            "gym" => $gym,
            "equipment" => $equipment,
            "equipment_gym" => $equipment_gym
        ]);
    }
}
