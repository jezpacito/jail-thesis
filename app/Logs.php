<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $fillable = [
        'user_id',
        'time_in',
        'time_out'
    ];

    public function employee(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
