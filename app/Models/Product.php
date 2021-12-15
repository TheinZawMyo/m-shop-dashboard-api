<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'p_name',
        'price',
        'specs',
        'qty',
        'stock',
        'b_id'
    ];
}
