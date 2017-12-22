<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function program(){
        return $this->belongsTo('App\Program');
    }

    public function inside_contacts(){
        return $this->hasMany('App\ContactCompany');
    }

    public function getDateString(){
        //$date = Carbon::createFromFormat('Y-m-d h:i:s', $this->created_at, 'America/Montreal');
        $date = Carbon::parse($this->created_at);
        $date->timezone = 'America/Montreal';
        return $date->format('d/m/Y');
        //return $date->format('m/d/Y');
    }

    public function getUserName(){
        $user = $this->user;
        return $user->fname." ".$user->lname;
    }
}
