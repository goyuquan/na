<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','member'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function article()
    {
        return $this->hasMany('App\Article');
    }

    public function album()
    {
        return $this->hasMany('App\Album');
    }

    public function video()
    {
        return $this->hasMany('App\Video');
    }

}
