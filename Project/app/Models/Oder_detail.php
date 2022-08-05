<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder_detail extends Model
{
    use HasFactory;
    protected $table='order_detail';
    protected $guard=[];
    protected $fillable = [
        'order_id',
        'product_id',
        'quatity',
        'price',
        'total_money',
      
    ];
}
