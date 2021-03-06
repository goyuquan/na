<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name','alias','parent_id'];

    public function info()
    {
        return $this->hasMany('App\Info');
    }

}
