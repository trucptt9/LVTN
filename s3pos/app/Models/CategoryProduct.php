<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'category_products';

    protected $fillable = [
        'store_id',
        'code',
        'name',
        'status',
        'image',
        'description'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'store_id' => 'integer'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_ACTIVE;
            $model->code = $model->code ?? generateRandomString();
        });
        self::created(function ($model) {
            Cache::forget('sale-category');
            save_log_action("Tạo mới danh mục sản phẩm #$model->name");
        });
        self::updated(function ($model) {
            Cache::forget('sale-category');
            save_log_action("Cập nhật thông tin danh mục sản phẩm #$model->name");
        });
        self::deleted(function ($model) {
            Cache::forget('sale-category');
            save_log_action("Xóa danh mục sản phẩm #$model->name");
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

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('category_products.code', $code);
    }

    public function scopeStoreId($query, $store_id)
    {
        if (is_array($store_id)) {
            return $query->whereIn('category_products.store_id', $store_id);
        }
        return $query->where('category_products.store_id', $store_id);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('category_products.status', $status);
        }
        return $query->where('category_products.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('category_products.code', 'LIKE', "%$search%")
                ->orWhere('category_products.name', 'LIKE', "%$search%");
        });
    }
}
