<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
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
            'name' => $this->nama_produk,
            'type' => $this->kategori_produk,
            'interest' => $this->bunga_produk,
            'min_nom' => $this->nominal_min,
            'max_nom' => $this->nominal_max,
            'step_nom' => $this->nominal_kelipatan,
            'min_period' => $this->jangka_min,
            'max_period' => $this->jangka_max,
            'step_period' => $this->kelipatan,
        ];
    }
}
