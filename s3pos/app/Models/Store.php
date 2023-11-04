<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'stores';

    protected $fillable = [
        'brand_id',
        'business_type_id',
        'code',
        'name',
        'phone',
        'address',
        'status',
        'description',
    ];

    protected $hidden = [];

    protected $casts = [
        'brand_id' => 'integer',
        'business_type_id' => 'integer',
        'status' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? true;
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
        return $query->where('stores.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('stores.status', $status);
    }

    public function scopeBrandId($query, $brand_id)
    {
        return $query->where('stores.brand_id', $brand_id);
    }

    public function scopeBusinessTypeId($query, $business_type_id)
    {
        return $query->where('stores.business_type_id', $business_type_id);
    }

    public function businessType()
    {
        return $this->belongsTo(BusinessType::class, 'business_type_id');
    }
}
