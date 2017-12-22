<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Job extends Model
{
    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function category(){
        return $this->belongsTo('App\JobCategory','jobcategory_id');
    }

    public function getDateString(){
        $date = Carbon::parse($this->created_at);
        $date->timezone = 'America/Montreal';
        return $date->format('d/m/Y');
        //return $date->format('l jS \\of F Y h:i:s A');
    }
}
