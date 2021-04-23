<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'cottage_type'
    ];

    public function cottages(){
        return $this->hasMany(Cottage::class);
    }
}
