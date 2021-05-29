<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected  $fillable = [
        'user_id',
        'date_booked',
        'cottage_id',
        'room_id',
        'type',
        'isPaid'

    ];

    public function cottage(){
        return $this->belongsTo(Cottage::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function guest(){
        return $this->belongsTo(User::class,'user_id','id');
    }


}
