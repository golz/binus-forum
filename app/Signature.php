<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $fillable = [
        'content'
    ];

    public function user(){
        return $this->hasOne('App\User');
    }
}
