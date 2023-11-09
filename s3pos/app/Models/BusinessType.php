<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    use HasFactory;
    protected $table = 'business_types';

    protected $fillable = [
        'code',
        'name',
        'status'
    ];

    protected $hidden = [];

    protected $casts = [
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
            save_log_action_admin("Tạo mới loại hình doanh nghiệp #$model->name");
        });
        self::updated(function ($model) {
            save_log_action_admin("Cập nhật thông tin loại hình doanh nghiệp #$model->name");
        });
        self::deleted(function ($model) {
            save_log_action_admin("Xóa loại hình doanh nghiệp #$model->name");
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
        return $query->where('business_types.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('business_types.status', $status);
        }
        return $query->where('business_types.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('business_types.code', 'LIKE', "%$search%")
                ->orWhere('business_types.name', 'LIKE', "%$search%");
        });
    }

    public function stores()
    {
        return $this->hasMany(Store::class, 'business_type_id', 'id');
    }
}
