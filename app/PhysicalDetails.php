<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalDetails extends Model
{
    protected $fillable = [
        'prisoner_id',
        'height',
        'weight',
        'build',
        'eyes',
        'hair',
        'complexion',
        'religion',
        'nearest_kin',
        'address_nearest_kin',
        'bertillon_marks'
    ];
    public function prisoner(){
        return $this->belongsTo(Prisoner::class);
    }#
}
