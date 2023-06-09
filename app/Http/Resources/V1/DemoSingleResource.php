<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class DemoSingleResource extends JsonResource
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
            'product_id' => $this->product_id,
            'name' => $this->name,
            'company_name' => $this->company_name,
            'email' => $this->email,
            'country_id' => $this->country_id,
            'number' => $this->number,
            'industry' => $this->industry,
            'needs' => $this->needs,
        ];
    }
}
