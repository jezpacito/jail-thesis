<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FingerPrintResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'serialnumber'=>$this->serialnumber,
            'fingerprint_id' =>$this->fingerprint_id,
            'checkindate'=>$this->checkindate,
            // 'timein',
            // 'timeout'
        ];
    }
}
