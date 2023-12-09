<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';
    protected $table = 'orders';

    public $timestamps = false;

    public function customers() {
        return $this->belongsTo(Customer::class, 'order_id', 'order_id');
    }
}
