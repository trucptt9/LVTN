<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleSource extends Model
{
    use HasFactory;
    protected $table = 'sale_sources';

    protected $fillable = [
        'store_id',
        'code',
        'name',
        'status',
        'default'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'status' => 'boolean',
        'store_id' => 'integer',
        'default' => 'boolean'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? true;
            $model->code = $model->code ?? generateRandomString();
            $model->default = $model->default ?? false;
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

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('sale_sources.code', $code);
    }

    public function scopeOfDefault($query, $default)
    {
        return $query->where('sale_sources.default', $default);
    }

    public function scopeStoreId($query, $store_id)
    {
        if (is_array($store_id)) {
            return $query->whereIn('sale_sources.store_id', $store_id);
        }
        return $query->where('sale_sources.store_id', $store_id);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('sale_sources.status', $status);
        }
        return $query->where('sale_sources.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('sale_sources.code', 'LIKE', "%$search%")
                ->orWhere('sale_sources.name', 'LIKE', "%$search%");
        });
    }
}
