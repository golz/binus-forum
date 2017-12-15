<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    public function replies(){
        return $this->hasMany('App\Reply');
    }
    public function topic(){
        return $this->belongsTo('App\Topic');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
