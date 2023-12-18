<?php

namespace App\Http\Resources\Nomenclature;

use App\Http\Resources\Part\PartSimpleResource;
use App\Http\Resources\Warehouse\WarehouseSimpleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NomenclatureResource extends JsonResource
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
            'part' => PartSimpleResource::collection($this->parts),
            'is_exist' => $this->is_exist,
            'warehouse' => WarehouseSimpleResource::collection($this->warehouses)
        ];
    }
}
