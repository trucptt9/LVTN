<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'code',
        'image',
        'image',
        'price',
        'cost',
        'is_menu',
        'status',
        'description',
    ];

    protected $hidden = [];

    protected $casts = [
        'status' => 'boolean',
        'category_id' => 'integer',
        'price' => 'integer',
        'cost' => 'integer',
        'is_menu' => 'boolean',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function scopeOfCode($query, $code)
    {
        return $query->where('products.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('products.status', $status);
    }

    public function scopeStoreId($query, $category_id)
    {
        return $query->where('products.category_id', $category_id);
    }

    public function scopeIsdMenu($query, $is_menu)
    {
        return $query->where('products.is_menu', $is_menu);
    }

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }
}
