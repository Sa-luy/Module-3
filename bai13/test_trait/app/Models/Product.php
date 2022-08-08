<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'detail','image_name', 'path', 'price','type', 'status'
    ];

    public function getTypeAttribute($value)
    {
        if ($value) return 'SMART_PHONE';

        return 'LAPTOP';
    }

    public function getStatusAttribute($value)
    {
        if ($value) return 'NEW';

        return 'OLD';
    }
    public function scopeName($query, $request)
    {
        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        return $query;
    }

    public function scopeStatus($query, $request)
    {
        if ($request->has('status')) {
            $query->where('name', $request->status);
        }

        return $query;
    }

    public function scopeType($query, $request)
    {
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        return $query;
    }

    public function scopePrice($query, $request)
    {
        if ($request->has('price')) {
            $query->where('price', $request->price);
        }

        return $query;
    }


}
