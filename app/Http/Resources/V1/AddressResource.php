<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'province' => $this->province,
            'district' => $this->district,
            'sub_district' => $this->sub_district,
            'postal_code' => $this->postal_code,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'is_main' => $this->is_main,
        ];
    }
}
