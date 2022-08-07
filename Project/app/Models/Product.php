<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory,SoftDeletes,Filterable;
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function filterName($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value . '%');
    }

    public function filterStatus($query, $value)
    {
        return $query->where('status', $value);
    }

    public function filterDescription($query, $value)
    {
        return $query->where('description', $value);
    }

    public function filterPrice($query, $value)
    {
        return $query->where('price', $value);
    }

}
