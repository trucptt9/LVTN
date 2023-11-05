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
        'status',
        'description',
    ];

    protected $hidden = [];

    protected $casts = [
        'category_id' => 'integer',
        'price' => 'integer',
        'cost' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_ACTIVE;
            $model->code = $model->code ?? generateRandomString();
            $model->price = $model->price ?? 0;
            $model->cost = $model->cost ?? 0;
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';

    public static function get_status($status = '')
    {
        $types = [
            self::STATUS_ACTIVE => ['Đang kích hoạt', 'success', COLOR_SUCCESS],
            self::STATUS_BLOCKED => ['Tạm ngưng', 'danger', COLOR_DANGER],
        ];
        return $status == '' ? $types : $types["$status"];
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('products.code', $code);
    }
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('products.code', 'LIKE', "%$search%")
                ->orWhere('products.name', 'LIKE', "%$search%");
        });
    }
    public function scopeOfStatus($query, $status)
    {
        return $query->where('products.status', $status);
    }

    public function scopeStoreId($query, $store_id)
    {
        if (is_array($store_id)) {
            return $query->whereIn('products.store_id', $store_id);
        }
        return $query->where('products.store_id', $store_id);
    }

    public function scopeCategoryId($query, $category_id)
    {
        if (is_array($category_id)) {
            return $query->whereIn('products.category_id', $category_id);
        }
        return $query->where('products.category_id', $category_id);
    }
    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }
}