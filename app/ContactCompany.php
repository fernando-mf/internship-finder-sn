<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactCompany extends Model
{
    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }
}
