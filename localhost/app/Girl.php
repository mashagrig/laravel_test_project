<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
 * @mixin \Eloquent
 */
class Girl extends Model
{
    protected $table = 'girls';
    protected $guarded = [];
}
