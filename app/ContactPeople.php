<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPeople extends Model
{
    protected $fillable = [
        'name',
        'address',
        'contact',
        'relationship',
        'prisoner_id',
        'contact_people_type_id'
        ];

    public function contactTypes(){
        return $this->belongsTo(ContactPeopleType::class,'contact_people_type_id','id');
    }

    public function prisoner(){
        return $this->belongsTo(Prisoner::class,'prisoner_id','id');
    }
}
