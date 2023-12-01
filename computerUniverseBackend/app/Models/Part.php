<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $primaryKey = 'model_number';
    protected $table = 'parts';
    public $timestamps = false;
}
