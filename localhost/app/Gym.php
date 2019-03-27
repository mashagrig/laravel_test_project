<?php

namespace App;
use App\Equipment;
use App\EquipmentGym;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Gym
 *
 * @property int $id
 * @property string $gym_name
 * @property int $gym_num
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Equipment[] $equipments
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym whereGymName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym whereGymNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Gym extends Model
{
    protected $table = 'gyms';
    protected $guarded = [];
    public function equipments(){
       return $this->belongsToMany('App\Equipment');
        //->withPivot('equipment_id', 'gym_id')
       // $this->belongsToMany('App\Equipment', 'equipment_gym', 'gym_id', 'equipment_id');
    }


    public function getNameAttribute () {
        return $this->abilityType->name;
    }
}
