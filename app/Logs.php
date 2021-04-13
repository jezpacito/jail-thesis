<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $fillable = [
        'prisoner_id',
        'time_in',
        'time_out'
    ];

    public function prisoner(){
        return $this->belongsTo(Prisoner::class,'prisoner_id','id');
    }
}
