<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function categories(){
        return $this->hasMany('App\JobCategory');
    }

    public function getName(){
        return $this->code." ".$this->name;
    }
}
