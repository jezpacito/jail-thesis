<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $fillable = [
      'skills',
      'prisoner_id'
    ];

    public function prisoner(){
        return $this->belongsTo(Prisoner::class,'prisoner_id','id');
    }
}
