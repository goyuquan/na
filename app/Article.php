<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','thumbnail','display_id','content','free','published_at'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
