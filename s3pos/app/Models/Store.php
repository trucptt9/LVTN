<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'stores';

    protected $fillable = [
        'business_type_id',
        'code',
        'name',
        'phone',
        'address',
        'status',
        'description',
        'logo'
    ];

    protected $hidden = [];

    protected $casts = [
        'business_type_id' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_UN_ACTIVE;
            $model->code = $model->code ?? generateRandomString();
        });
        self::created(function ($model) {
            save_log_action_admin("Tạo mới cửa hàng #$model->name");
        });
        self::updated(function ($model) {
            save_log_action_admin("Cập nhật thông tin cửa hàng #$model->name");
        });
        self::deleted(function ($model) {
            save_log_action_admin("Xóa cửa hàng #$model->name");
            // delete logo
            remove_s3_file($model->logo);
        });
    }

    const STATUS_UN_ACTIVE = 'un_active';
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

    public function scopeBusinessTypeId($query, $business_type_id)
    {
        return $query->where('stores.business_type_id', $business_type_id);
    }

    public function businessType()
    {
        return $this->belongsTo(BusinessType::class, 'business_type_id');
    }

    public function license()
    {
        return $this->hasOne(License::class, 'store_id', 'id')->ofStatus(License::STATUS_ACTIVE);
    }

}