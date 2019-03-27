<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Gym
 *
 * @property int $id
 * @property string $gym_name
 * @property int $gym_num
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym whereGymName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym whereGymNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym where($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gym whereUpdatedAt($value)
 */
	class Gym extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string $role_name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereRoleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\Husband
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $girl_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Husband newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Husband newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Husband query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Husband whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Husband whereGirlId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Husband whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Husband whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Husband whereUpdatedAt($value)
 */
	class Husband extends \Eloquent {}
}

namespace App{
/**
 * App\Girl
 *
 * @property int $id
 * @property string $name_girl
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $dress_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Girl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Girl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Girl query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Girl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Girl whereDressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Girl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Girl whereNameGirl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Girl whereUpdatedAt($value)
 */
	class Girl extends \Eloquent {}
}

namespace App{
/**
 * App\Equipment
 *
 * @property int $id
 * @property string $equip_name
 * @property int $equip_serial_number
 * @property int $equip_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment whereEquipCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment whereEquipName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment whereEquipSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Equipment whereUpdatedAt($value)
 */
	class Equipment extends \Eloquent {}
}

namespace App{
/**
 * Post
 *
 * @mixin Eloquent
 * @property int $id
 * @property string $role_name
 * @property string $description
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole whereRoleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole whereUpdatedAt($value)
 */
	class Roole extends \Eloquent {}
}

namespace App{
/**
 * App\Dress
 *
 * @property int $id
 * @property string $type_dress
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress whereTypeDress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress whereUpdatedAt($value)
 */
	class Dress extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $role_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

