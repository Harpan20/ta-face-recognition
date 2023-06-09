<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'description' => $this->description,
            'image_hero' => handle_get_image_from_db($this->image_hero),
            'image_feature' => handle_get_image_from_db($this->image_feature),
            'image_benefit' => handle_get_image_from_db($this->image_benefit),
            'image_benefit_mobile' => handle_get_image_from_db($this->image_benefit_mobile),
        ];
    }
}
