<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_date',
        'booking_time',
        'guest_id'
    ];

    public function guest(){
        return $this->belongsTo(User::class,'guest_id','id');
    }


    
}
