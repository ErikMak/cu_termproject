<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';
    protected $table = 'customers';

    public $timestamps = false;

    public function orders() {
        return $this->hasMany(Order::class, 'order_id', 'order_id');
    }

    public function managers() {
        return $this->belongsTo(Manager::class, 'customer', 'manager_id');
    }
}
