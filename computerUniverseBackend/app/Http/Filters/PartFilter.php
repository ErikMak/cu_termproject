<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PartFilter extends QueryFilter {
    public function name(string $name) {
        $this->builder
            ->join('nomenclature', 'parts.model_number', '=', 'nomenclature.model_number')
            ->join('warehouses', 'nomenclature.warehouse', '=', 'warehouses.id')
            ->where('parts.name', 'like', '%'.$name.'%');
    }
}
