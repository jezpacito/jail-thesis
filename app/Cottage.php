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
        'file_name',
        'file_path'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
