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
        // 'email',
        'address',
        'creator_id',
        // 'finger_print',
        'serialnumber',
        'fingerprint_id',
        'fingerprint_select',
        'date',
        'timein',
        'del_fingerid',
        'add_fingerid',
        'isDischarge'
    ];

    public function creator(){
        return $this->belongsTo(User::class);
    }

    public function fingerPrint(){
        return $this->hasOne(FingerPrint::class);
    }
}
