<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSetting extends Model
{
    use HasFactory;
    protected $table = 'admin_settings';

    protected $fillable = [
        'code',
        'name',
        'description',
        'type',
        'value',
        'data',
        'numering',
        'status',
        'group_id'
    ];

    protected $hidden = [];

    protected $casts = [
        'group_id' => 'integer',
        'numering' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? 'active';
            $model->code = $model->code ?? generateRandomString();
            $model->type = $model->type ?? self::TYPE_TEXT;
            $model->value = $model->value ?? '';
            $model->numering = $model->numering ?? self::getOrder($model->group_id);
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

    const TYPE_TEXT = 'text';
    const TYPE_FILE = 'file';
    const TYPE_SELECT = 'select';
    const TYPE_RADIO = 'radio';

    public function scopeOfCode($query, $code)
    {
        return $query->where('admin_settings.code', $code);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('admin_settings.type', $type);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('admin_settings.status', $status);
    }

    public function scopeGroupId($query, $group_id)
    {
        return $query->where('admin_settings.group_id', $group_id);
    }

    public static function getOrder($group_id)
    {
        $max = AdminSetting::groupId($group_id)->max('numering') ?? 0;
        return $max + 1;
    }

    public function group()
    {
        return $this->belongsTo(AdminSettingGroup::class, 'group_id');
    }
}
