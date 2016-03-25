<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'name','email','phone','role','password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function info()
    {
        return $this->hasMany('App\Info');
    }
    
}
