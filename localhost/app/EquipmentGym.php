<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\EquipmentGym
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $equipment_id
 * @property int $gym_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EquipmentGym newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EquipmentGym newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EquipmentGym query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EquipmentGym whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EquipmentGym whereEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EquipmentGym whereGymId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EquipmentGym whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EquipmentGym whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EquipmentGym extends Model
{
    protected $table = 'equipment_gym';
    protected $guarded = [];
}
