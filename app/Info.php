<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = ['user_id','category_id','title','text','content','publish_at'];


    public function Category()
    {

     return $this->hasMany('App\column');

    }

}
