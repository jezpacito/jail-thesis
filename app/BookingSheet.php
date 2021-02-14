<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingSheet extends Model
{
    protected $fillable = [
        'reference_no',
        'agency',
        'agency_address',
        'category_prisoner'
    ];
    public function prisoner(){
        return $this->belongsTo(Prisoner::class);
    }
}
