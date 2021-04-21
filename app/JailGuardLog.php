<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JailGuardLog extends Model
{
    protected $fillable = [
        'serialnumber',
        'fingerprint_id',
        'checkindate',
        'timein',
        'timeout',
    ];
}
