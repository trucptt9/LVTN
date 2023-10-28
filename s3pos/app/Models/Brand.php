<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';

    protected $fillable = [
        'code',
        'name',
        'phone',
        'email',
        'address',
        'logo',
        'status',
        'description',
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'status' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? false;
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

    public function scopeOfCode($query, $code)
    {
        return $query->where('brands.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('brands.status', $status);
        }
        return $query->where('brands.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('brands.code', 'LIKE', "%$search%")
                ->orWhere('brands.name', 'LIKE', "%$search%")
                ->orWhere('brands.email', 'LIKE', "%$search%")
                ->orWhere('brands.phone', 'LIKE', "%$search%");
        });
    }
}
