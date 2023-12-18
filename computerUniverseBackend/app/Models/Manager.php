<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $primaryKey = 'manager_id';
    protected $table = 'managers';

    public $timestamps = false;

    public function customers() {
        return $this->hasMany(Customer::class, 'customer', 'manager_id');
    }
}
