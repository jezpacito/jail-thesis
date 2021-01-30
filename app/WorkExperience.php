<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = [
        'occupation_work',
        'prisoner_id',
        'employeer_name',
        'date_employed'
    ];

    public function prisoner(){
        return $this->belongsTo(Prisoner::class,'prisoner_id','id');
    }

}
