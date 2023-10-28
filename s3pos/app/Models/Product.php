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
        'name',
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

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? true;
            $model->code = $model->code ?? generateRandomString();
            $model->price = $model->price ?? 0;
            $model->cost = $model->cost ?? 0;
            $model->is_menu = $model->is_menu ?? true;
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
