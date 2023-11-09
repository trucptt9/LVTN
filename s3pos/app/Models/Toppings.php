<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toppings extends Model
{
    use HasFactory;
    protected $table = 'toppings';

    protected $fillable = [
        'group_id',
        'code',
        'name',
        'status',
        'image',
        'price',
        'cost',
    ];

    protected $hidden = [];

    protected $casts = [
        'group_id' => 'integer',
        'price' => 'integer',
        'cost' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_ACTIVE;
            $model->code = $model->code ?? generateRandomString();
            $model->price = $model->price ?? 0;
            $model->cost = $model->cost ?? 0;
        });
        self::created(function ($model) {
            save_log_action("Tạo mới topping #$model->name");
        });
        self::updated(function ($model) {
            save_log_action("Cập nhật thông tin topping #$model->name");
        });
        self::deleted(function ($model) {
            save_log_action("Xóa topping #$model->name");
            remove_s3_file($model->image);
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
        return $query->where('toppings.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('toppings.status', $status);
    }

    public function scopeGroupId($query, $group_id)
    {
        if (is_array($group_id)) {
            return $query->whereIn('toppings.group_id', $group_id);
        }
        return $query->where('toppings.group_id', $group_id);
    }

    public function group()
    {
        return $this->belongsTo(ToppingGroup::class, 'group_id');
    }
}
