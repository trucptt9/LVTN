<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToppingGroup extends Model
{
    use HasFactory;
    protected $table = 'topping_groups';

    protected $fillable = [
        'store_id',
        'code',
        'name',
        'status',
        'image'
    ];

    protected $hidden = [];

    protected $casts = [
        'store_id' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_ACTIVE;
            $model->code = $model->code ?? generateRandomString();
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
        return $query->where('topping_groups.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('topping_groups.status', $status);
    }

    public function scopeStoreId($query, $store_id)
    {
        return $query->where('topping_groups.store_id', $store_id);
    }
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('products.code', 'LIKE', "%$search%")
                ->orWhere('products.name', 'LIKE', "%$search%");
        });
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}