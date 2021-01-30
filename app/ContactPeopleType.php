<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPeopleType extends Model
{
    protected $fillable = [
        'type'
    ];

    public function contacts(){
        return $this->hasMany(ContactPeople::class,'contact_people_type_id','id');
    }
}
