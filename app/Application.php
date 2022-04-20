<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function applicant()
    {
        return $this->belongsTo('App\Applicant','applicant_id','id');
    }


    public function country()
    {
        return $this->belongsTo('App\Country','country_id','id');
    }


    public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }


    public function jobVacancy()
    {
        return $this->belongsTo('App\JobVacancy','job_vacancy_id','id');
    }


    public function user()
    {
        return $this->belongsTo('App\User','assigned_to','id');
    }

}