<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotions';

    protected $fillable = [
        'store_id',
        'code',
        'subject',
        'start',
        'end',
        'value',
        'type_value',
        'total_order',
        'status',
        'description',
    ];

    protected $hidden = [];

    protected $casts = [
        'store_id' => 'integer',
        'value' => 'integer',
        'total_order' => 'integer',
        'start' => 'date:Y-m-d',
        'end' => 'date:Y-m-d',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_BLOCKED;
            $model->code = $model->code ?? generateRandomString();
            $model->value = $model->value ?? 0;
            $model->type_value = $model->type_value ?? self::TYPE_PERCENT;
        });
        self::created(function ($model) {
            save_log_action("Tạo mới khuyến mãi #$model->name");
        });
        self::updated(function ($model) {
            save_log_action("Cập nhật thông tin khuyến mãi #$model->name");
        });
        self::deleted(function ($model) {
            save_log_action("Xóa khuyến mãi #$model->name");
        });
    }

    const STATUS_UN_ACTIVE = 'un_active';
    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';

    public static function get_status($status = '')
    {
        $_status = [
            self::STATUS_UN_ACTIVE => ['Đang khởi tạo', 'secondary', COLOR_SECONDARY],
            self::STATUS_ACTIVE => ['Đang chạy', 'success', COLOR_SUCCESS],
            self::STATUS_BLOCKED => ['Đã kết thúc', 'danger', COLOR_DANGER],
        ];
        return $status == '' ? $_status : $_status["$status"];
    }

    const TYPE_VND = 'vnd';
    const TYPE_PERCENT = 'percent';

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
        return $query->where('promotions.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('promotions.status', $status);
    }

    public function scopeStoreId($query, $store_id)
    {
        return $query->where('promotions.store_id', $store_id);
    }

    public function scopeExpired($query)
    {
        return $query->where('promotions.end', '<=', now());
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}