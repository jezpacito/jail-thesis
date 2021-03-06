<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cottage extends Model
{
    protected $fillable = [
        'name',
        'nightRate',
        'dayRate',
        'isVacant',
        'category_id',
        'isNightAvailable',
        'isDayAvailable',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
