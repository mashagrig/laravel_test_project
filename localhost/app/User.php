<?php

namespace App;

//use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MyPasswordReset;

use Illuminate\Auth\Passwords\CanResetPassword;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $role_id
 * @property-read \App\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends  Authenticatable implements MustVerifyEmail
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password','phone','address','google_id',
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $fillable = ['name', 'email', 'email_verified_at', 'role_id'];
//    protected $hidden = [
//        'password', 'remember_token',
//    ];
    protected $table = 'users';
    protected $guarded = [];


    public function role()
    {
        return  $this->belongsTo("App\Role", "role_id", "id");
    }

    public function sendPasswordResetNotification($token){
        $this->notify(new MyPasswordReset($token));
    }

//    public function sendEmailVerificationNotification($token){
//        $this->notify(new MyPasswordReset($token));
//    }






//protected $name;
//
//    public  function getName(string $email){
//        $this->name = User::select('name')
//            ->where('email', '=', $email)
//            ->get()[0]->name;
////        $this->name = User::where('email', '=', request()->email)
////            ->get()[0]->name;
//    }
}
