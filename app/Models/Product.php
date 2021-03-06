<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'p_name',
        'price',
        'specs',
        'p_image',
        'qty',
        'stock',
        'b_id'
    ];

    // protected $primaryKey = 'p_id';
}
