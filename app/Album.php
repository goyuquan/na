<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['title','thumbnail','thumbnail2','display_id','content','free','published_at'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function img()
    {
        return $this->hasMany('App\Img');
    }

    public function display()
    {
        return $this->belongsTo('App\Display');
    }


}
