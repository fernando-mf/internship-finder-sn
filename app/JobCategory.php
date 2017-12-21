<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    public function jobs(){
        return $this->hasMany('App\Job');
    }

    public function program(){
        return $this->belongsTo('App\Program');
    }
}
