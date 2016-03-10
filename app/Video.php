<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title','thumbnail','thumbnail2','display_id','content','video','free','published_at'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function display()
    {
        return $this->belongsTo('App\Display');
    }


}
