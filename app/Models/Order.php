<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Order extends Model
{
    use HasFactory;
    protected $fillable = ['code','user_id','name','total_price','address','phone','status','note','created_at','updated_at'];

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo((User::class), 'user_id','id');
    }
    public function orderDetails()
{
    return $this->hasMany(Order_detail::class, 'order_id', 'id');
}
}
