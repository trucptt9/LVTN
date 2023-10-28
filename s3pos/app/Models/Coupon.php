<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';

    protected $fillable = [
        'store_id',
        'code',
        'name',
        'start',
        'end',
        'value',
        'type_value',
        'status',
        'usage',
    ];

    protected $hidden = [];

    protected $casts = [
        'status' => 'boolean',
        'store_id' => 'integer',
        'value' => 'integer',
        'start' => 'date:Y-m-d',
        'end' => 'date:Y-m-d',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    const TYPE_VND = 1;
    const TYPE_PERCENT = 2;

    public static function get_type($type = '')
    {
        $types = [
            self::TYPE_VND => ['VND', 'secondary', COLOR_SECONDARY],
            self::TYPE_PERCENT => ['%', 'success', COLOR_SUCCESS],
        ];
        return $type == '' ? $types : $types["$type"];
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('coupons.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('coupons.status', $status);
    }

    public function scopeStoreId($query, $store_id)
    {
        return $query->where('coupons.store_id', $store_id);
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
