<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OffenseData extends Model
{
    protected  $fillable = [
        'prisoner_id',
        'crime_committed',
        'criminal_case_no',
        'trial_court',
        'sentence_term',
        'date_imprisonment',
        'place_imprisonment',
        'date_sentence_commence',
        'prev_crim_record',
        'date_release',
        'sentence_by',
        'sentence'
    ];
    public function prisoner(){
        return $this->belongsTo(Prisoner::class);
    }
}
