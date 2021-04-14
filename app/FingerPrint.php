<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FingerPrint extends Model
{
    protected $fillable = [
        'jail_guard_id',
        'date_scan'
    ];

    public function jail_guard(){
        return $this->belongsTo(JailGuard::class);
    }
}
