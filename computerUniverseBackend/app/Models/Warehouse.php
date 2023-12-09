<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'warehouses';
    public $timestamps = false;

    public function staff() {
        return $this->hasMany(Staff::class, 'staff_id', 'director');
    }
}
