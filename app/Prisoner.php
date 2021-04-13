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
        'birthdate',
        'rfid_uuid'
    ];


    public function contacts(){
        return $this->hasMany(ContactPeople::class,'prisoner_id','id');
    }
    public function physicalDetails(){
        return $this->hasOne(PhysicalDetails::class);
    }
    public function offenseData(){
        return $this->hasOne(OffenseData::class);
    }
    public function booking(){
        return $this->hasOne(BookingSheet::class);
    }
    public function logs(){
        return $this->hasMany(Logs::class,'prisoner_id','id');
    }
}
