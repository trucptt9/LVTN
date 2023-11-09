<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'quantity',
        'price',
        'note',
        'total',
        'toppings',
        'topping_total'
    ];

    protected $hidden = [];

    protected $casts = [
        'topping_total' => 'integer',
        'order_id' => 'integer',
        'product_id' => 'integer',
        'quantity' => 'integer',
        'total' => 'integer',
        'price' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->quantity = $model->quantity ?? 0;
            $model->price = $model->price ?? 0;
            $model->total = $model->total ?? 0;
            $model->topping_total = $model->topping_total ?? 0;
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('order_details.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('order_details.status', $status);
    }

    public function scopeOrderId($query, $order_id)
    {
        return $query->where('order_details.order_id', $order_id);
    }

    public function scopeProductId($query, $product_id)
    {
        return $query->where('order_details.product_id', $product_id);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
