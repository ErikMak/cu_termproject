<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomenclature extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'nomenclature';

    public $timestamps = false;

    protected $casts = [
        'is_exist' => 'boolean',
    ];

    public function parts() {
        return $this->hasMany(Part::class, 'model_number', 'model_number');
    }

    public function warehouses() {
        return $this->hasMany(Warehouse::class, 'id', 'warehouse');
    }
}
