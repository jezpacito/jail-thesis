<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalDetails extends Model
{
    protected $fillable = [
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
}
