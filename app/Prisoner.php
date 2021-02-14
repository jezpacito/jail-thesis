<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prisoner extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'middlename',
        'place_of_birth',
        'permanent_address',
        'previous_address',
        'age',
        'occupation',
        'status',
        'interviewer',
        'designation',
        'nationality',
        'alias',
        'gender',
        'birthdate'
    ];


    public function contacts(){
        return $this->hasMany(ContactPeople::class,'prisoner_id','id');
    }
}
