<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{

    public function country()
    {
        return $this->belongsTo('App\Country','country_id','id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }

}