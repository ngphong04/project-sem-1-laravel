<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_img extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'product_id'];
    /**
     * Get the user that owns the Product_img
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product() 
    {
        return $this->belongsTo(Product::class);
    }
}
