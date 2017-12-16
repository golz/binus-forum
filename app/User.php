<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'fullname', 'username', 'nim', 'email', 'dob', 'image', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function threads(){
        return $this->hasMany('App\Thread');
    }

    public function replies(){
        return $this->hasMany('App\Reply');
    }

    public function role(){
        return $this->hasOne('App\Role');
    }

    public function topicModerators(){
        return $this->hasMany('App\TopicModerator');
    }
}
