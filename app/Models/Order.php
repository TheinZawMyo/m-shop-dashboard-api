<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'order_id',
        'user_id',
        'p_id',
        'apt_rjt_order',
        'qty',
        'total'
    ];

    public function orderUser(){
        return $this->belongsToMany(User::class, 'user_id', 'id');
    }
}
