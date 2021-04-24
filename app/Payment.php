<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['guest_id','amount_paid'];

    public function guest_paid(){
        return $this->belongsTo(User::class,'guest_id','id');
    }
}
