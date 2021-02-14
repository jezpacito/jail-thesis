<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JailGuard extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'middlename',
        'contact_no',
        'email',
        'address',
        'creator_id'
    ];

    public function creator(){
        return $this->belongsTo(User::class);
    }
}
