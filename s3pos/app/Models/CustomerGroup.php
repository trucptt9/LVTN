<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{
    use HasFactory;
    protected $table = 'customer_groups';

    protected $fillable = [
        'brand_id',
        'code',
        'name',
        'status',
        'default',
        'description'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'status' => 'boolean',
        'brand_id' => 'integer',
        'default' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? true;
            $model->default = $model->default ?? true;
            $model->code = $model->code ?? generateRandomString();
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

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

    public function customers()
    {
        return $this->hasMany(Customer::class, 'group_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function scopeOfDefault($query, $default)
    {
        return $query->where('customer_groups.default', $default);
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('customer_groups.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('customer_groups.status', $status);
        }
        return $query->where('customer_groups.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('customer_groups.code', 'LIKE', "%$search%")
                ->orWhere('customer_groups.name', 'LIKE', "%$search%");
        });
    }
}
