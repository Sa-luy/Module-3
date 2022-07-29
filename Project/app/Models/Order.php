<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable =[
        'user_id',
        'address',
        'fullname',
        'email',
        'phone',
        'order_date',
        'notes',
        'status',
    ];
   protected $timeStamp=false;
}
