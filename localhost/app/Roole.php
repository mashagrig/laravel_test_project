<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



/**
 * App\Roole
 *
 * @property int $id
 * @property string $str
 * @property int $int
 * @property float $dec
 * @property int $bool
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read mixed $role_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole whereBool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole whereDec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole whereInt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole whereStr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Roole whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Roole extends Model
{
    //поля будут включены в обработку
    //protected $fillable = ['id', 'str'];


    //поляя будут исключены из обработки
    protected $table = 'rooles';
    protected $guarded = [];

    const CREATED_AT = 'roole_created_at';
    const UPDATED_AT = 'roole_updated_at';

    public function getRoleNameAttribute(){
        return $this->attributes['id'] . '-' .$this->attributes['description'];
    }

    //по умолчанию поиск записи из параметров из URI сверяется в таблицах по id
    //переопределяем сверку - теперь по указанному полю!!!
    //alias параметра в строке - теперь значение из поля таблицы указанного в методое
    //то есть если теперь в строке запроса напишем (не '1', а) "ооо" (из значения поля 'str'), то в контролере будем ловить записи по номеру строки.
//    public function getRouteKeyName(){
//        return 'str';
//    }


}
