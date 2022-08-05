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
   function customer()
   {
    return $this->hasMany(Customer::class,'customer_id','id');
   }
   function products()
   {
    return $this->belongsToMany(Product::class,'order_detail','order_id','product_id');
   }
   function order_details()
   {
    return $this->hasMany(Oder_detail::class,'order_id','id');
   }
}
