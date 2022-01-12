<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'order_id',
        'u_id',
        'p_id',
        'apt_rjt_order',
        'qty',
        'total'
    ];
}
