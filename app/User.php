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

}
