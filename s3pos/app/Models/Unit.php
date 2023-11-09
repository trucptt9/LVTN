<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'units';

    protected $fillable = [
        'store_id',
        'code',
        'name',
        'status',
        'description',
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
            save_log_action("Tạo mới đơn vị #$model->name");
        });
        self::updated(function ($model) {
            save_log_action("Cập nhật thông tin đơn vị #$model->name");
        });
        self::deleted(function ($model) {
            save_log_action("Xóa đơn vị #$model->name");
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
        return $query->where('units.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('units.status', $status);
    }

    public function scopeStoreId($query, $store_id)
    {
        return $query->where('units.store_id', $store_id);
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
