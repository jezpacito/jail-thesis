<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
//    protected $guarded = [];
    protected $fillable = [
        'prisoner_id',
        'rfid_uuid',
        'dateTime_in',
        'dateTime_out'
    ];

    public function prisoner(){
      return  $this->belongsTo(Prisoner::class,'prisoner_id','id');
    }
}
