<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'number_persion',
        'booking_date',
        'booking_time',
        'guest_id',
        'time_type',
        'cottage_id',
        'isCheckout',
        'room_id',
        'isFinished',
    ];

    public function guest(){
        return $this->belongsTo(User::class,'guest_id','id');
    }

    public function cottage(){
        return $this->belongsTo(Cottage::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }


}
