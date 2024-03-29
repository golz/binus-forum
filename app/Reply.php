<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'thread_id', 'user_id', 'title', 'content'
    ];

    public function thread(){
        return $this->belongsTo('App\Thread');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
