<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name','room_types_id','status','description','no_of_person','price'
    ];

}
