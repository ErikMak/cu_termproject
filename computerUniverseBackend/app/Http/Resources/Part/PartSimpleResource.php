<?php

namespace App\Http\Resources\Part;

use Illuminate\Http\Resources\Json\JsonResource;

class PartSimpleResource extends JsonResource
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
            'model_number' => $this->model_number,
            'name'=> $this->name,
            'manufacturer'=> $this->manufacturer,
            'price'=> $this->price,
            'category'=> $this->category,
        ];
    }
}
