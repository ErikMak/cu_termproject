<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    use Filterable;

    protected $primaryKey = 'model_number';
    protected $table = 'parts';
    public $timestamps = false;

    protected $fillable = [
        'name', 'manufacturer',
        'price', 'warranty',
        'device_id', 'category'
    ];
}
