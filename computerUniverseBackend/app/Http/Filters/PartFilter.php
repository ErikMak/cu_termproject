<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PartFilter extends QueryFilter {
    public function warehouse(string $warehouse) {
        $this->builder
            ->join('nomenclature', 'parts.model_number', '=', 'nomenclature.model_number')
            ->join('warehouses', 'nomenclature.warehouse', '=', 'warehouses.id')
            ->where('warehouses.id', $warehouse);
    }
}
