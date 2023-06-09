<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'image_hero' => handle_get_image_from_db($this->image_hero),
            'image_l' => handle_get_image_from_db($this->image_l),
            'image_s' => handle_get_image_from_db($this->image_s),
            'published_at' => $this->published_at->format('d F, Y'),
            'views' => $this->views,
            'category' => new CategoryResource($this->category),
            'post_type' => new PostTypeResource($this->postType),
            'tags' => TagResource::collection($this->tags),
        ];
    }
}
