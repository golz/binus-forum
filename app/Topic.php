<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'type_id', 'title', 'description'
    ];

    public function threads(){
        return $this->hasMany('App\Thread');
    }

    public function type(){
        return $this->belongsTo('App\Type');
    }

    public function topicModerators(){
        return $this->hasMany('App\TopicModerator');
    }
}
