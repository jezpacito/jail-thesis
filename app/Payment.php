<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'guest_id',
        'amount_paid',
        'ref_no',
        'other_half',
        'booking_id'
    ];

    public function guest_paid(){
        return $this->belongsTo(User::class,'guest_id','id');
    }
    public function booking_id(){
        return $this->belongsTo(Booking::class);
    }
}
