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
        'creator_id',
        'finger_print'
    ];

    public function creator(){
        return $this->belongsTo(User::class);
    }

    public function fingerPrint(){
        return $this->hasOne(FingerPrint::class);
    }
}
