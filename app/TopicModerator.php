<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicModerator extends Model
{
    protected $fillable = [
        'topic_id', 'user_id'
    ];

    public function topic(){
        return $this->belongsTo('App\Topic');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
