<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function jobs(){
        return $this->hasMany('App\Job');
    }

    public function inside_contacts(){
        return $this->hasMany('App\ContactCompany');
    }
}
