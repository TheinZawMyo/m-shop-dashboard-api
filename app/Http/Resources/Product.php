<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            
            'id' => $this->p_id,
            'p_name' => $this->p_name,
            'price' => $this->price,
            'image' => base64_encode(file_get_contents(public_path('images/'.$this->p_image))),
            'specs' => $this->specs,
            'qty' => $this->qty,
            'stock' => $this->stock,
            'brand' => $this->b_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
            
        ];
    }
}
