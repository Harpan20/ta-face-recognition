<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class WhatsappResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'country' => new CountrySingleResource($this->country),
            'number' => $this->number,
            'number_formated' => $this->country->dial_code . $this->number,
            'is_main' => $this->is_main === 1 ? true : false,
        ];
    }
}
