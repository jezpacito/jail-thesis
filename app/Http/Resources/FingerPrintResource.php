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
            'jail_guard' =>$this->jail_guard,
            'date_scan' =>$this->date_scan
        ];
    }
}
