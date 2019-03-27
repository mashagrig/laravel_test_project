<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Dress
 *
 * @property int $id
 * @property string $type_dress
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Husband[] $husbands
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress whereTypeDress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dress whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Dress extends Model
{
    protected $table = 'dresses';
    protected $guarded = [];

    public function husbands(){
        return $this->hasManyThrough('App\Husband', 'App\Girl', 'dress_id', 'girl_id', 'id');
    }
}
