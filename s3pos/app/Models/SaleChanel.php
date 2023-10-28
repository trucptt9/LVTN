<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleChanel extends Model
{
    use HasFactory;
    protected $table = 'sale_channels';

    protected $fillable = [
        'source_id',
        'code',
        'name',
        'status',
        'default'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'status' => 'integer',
        'source_id' => 'integer',
        'default' => 'boolean'
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_SUSPEND = 2;

    public static function get_status($status = '')
    {
        $types = [
            self::STATUS_ACTIVE => ['Đang hoạt động', 'success', COLOR_SUCCESS],
            self::STATUS_SUSPEND => ['Tạm ngưng', 'light', COLOR_LIGHT],
        ];
        return $status == '' ? $types : $types["$status"];
    }

    public function source()
    {
        return $this->belongsTo(SaleSource::class, 'source_id');
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('sale_channels.code', $code);
    }

    public function scopeOfDefault($query, $default)
    {
        return $query->where('sale_channels.default', $default);
    }

    public function scopeSourceId($query, $source_id)
    {
        if (is_array($source_id)) {
            return $query->whereIn('sale_channels.source_id', $source_id);
        }
        return $query->where('sale_channels.source_id', $source_id);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('sale_channels.status', $status);
        }
        return $query->where('sale_channels.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('sale_channels.code', 'LIKE', "%$search%")
                ->orWhere('sale_channels.name', 'LIKE', "%$search%");
        });
    }
}
