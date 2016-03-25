<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','alias','parent_id'];

    public function info()
    {
        return $this->hasMany('App\Info');
    }

    public function column()
    {
        return $this->hasMany('App\Column');
    }

}
