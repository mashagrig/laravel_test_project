<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
 * @mixin \Eloquent
 */
class Husband extends Model
{
    protected $table = 'husbands';
    protected $guarded = [];
}
