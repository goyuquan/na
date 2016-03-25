<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = ['user_id','category_id','title','text','content','top','publish_at'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
