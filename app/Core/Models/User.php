<?php

namespace App\Core\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','yetki','img','facebook','twitter','googleplus'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function yetki(){
        return $this->yetki;
    }

    public function makale(){
        return $this->hasMany('App\Article', 'user_id', 'id');
    }

    public function makale01(){
        return $this->hasOne('App\Article', 'user_id', 'id');
    }

}
