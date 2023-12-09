<?php

namespace App\Http\Resources\Warehouse;

use App\Http\Resources\Staff\StaffResource;
use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseResource extends JsonResource
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
            'address' => $this->address,
            'director' => StaffResource::collection($this->staff)
        ];
    }
}
