<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function Person(){
        return $this->hasOne('App\Person');
    }

    public function University(){
        return $this->belongsTo('App\University');
    }

    public function Process(){
        return $this->hasMany('App\Process');
    }
}
