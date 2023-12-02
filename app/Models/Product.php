<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price' ,'sale_price' , 'available' ,'image', 'description', 'slug', 'category_id'];

    public function category()
    {
        return $this->belongsTo((Category::class));
    }

    public function order_details()
    {
        return $this->hasMany(Order_detail::class, 'product_id', 'id');
    }
}
