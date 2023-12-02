<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $primaryKey = 'bid_id';
    protected $table = 'credits';

    public $timestamps = false;
}
