<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function category(){
        return $this->belongsTo('App\JobCategory');
    }
}
