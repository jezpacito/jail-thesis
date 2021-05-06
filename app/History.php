<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected  $fillable = [
        'guest_id',
        'date_booked',
        'cottage_id',
    ];

    public function cottage(){
        return $this->belongsTo(Cottage::class);
    }

    public function guest(){
        return $this->belongsTo(User::class,'guest_id','id');
    }


}
