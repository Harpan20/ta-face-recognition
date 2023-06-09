<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LaporanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'result';

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'document' => $this->document,
            'start_date' => date('d F Y', strtotime($this->start_date)),
            'end_date' =>  date('d F Y', strtotime($this->end_date)),
        ];
    }
}
