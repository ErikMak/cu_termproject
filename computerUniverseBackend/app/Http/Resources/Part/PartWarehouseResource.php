<?php

namespace App\Http\Resources\Part;

use Illuminate\Http\Resources\Json\JsonResource;

class PartWarehouseResource extends JsonResource
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
            'manufacturer' => $this->manufacturer,
            'name' => $this->name,
            'price' => $this->price,
            'is_exist' => $this->is_exist
        ];
    }
}
