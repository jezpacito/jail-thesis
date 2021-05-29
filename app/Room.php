<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'isVacant',
        'description',
        'no_of_person',
        'price',
        'file_name',
        'file_path'
    ];
    public function room(){
        return $this->hasMany(Cottage::class);
    }
}
