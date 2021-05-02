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
        'price'
    ];
    public function cottages(){
        return $this->hasMany(Cottage::class);
    }
}
