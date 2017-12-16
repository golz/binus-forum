<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'topic_id', 'user_id', 'title', 'content', 'view', 'rating', 'is_announcement', 'status'
    ];

    public function topic(){
        return $this->belongsTo('App\Topic');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function replies(){
        return $this->hasMany('App\Reply');
    }

}
