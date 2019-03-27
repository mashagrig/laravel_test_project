<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Equipment
 *
 * @property int $id
 * @property string $equip_name
 * @property int $equip_serial_number
 * @property int $equip_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Gym[] $gyms
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment whereEquipCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment whereEquipName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment whereEquipSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Equipment extends Model
{
    protected $table = 'equipments';
    protected $guarded = [];
    public function gyms(){
        return  $this->belongsToMany('App\Gym', 'equipment_gym');
        //->withPivot('equipment_id', 'gym_id')
        //$this->belongsToMany('App\Gym', 'equipment_gym', 'equipment_id', 'gym_id');
    }
}
