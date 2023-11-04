<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class AdminMenu extends Model
{
    use HasFactory;
    protected $table = 'admin_menus';

    protected $fillable = [
        'code',
        'parent_id',
        'name',
        'url',
        'status',
        'icon',
        'numering'
    ];

    protected $hidden = [];

    protected $casts = [
        'parent_id' => 'integer',
        'numering' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $parent_id = $model->parent_id ?? 0;
            $model->status = $model->status ?? self::STATUS_ACTIVE;
            $model->parent_id = $parent_id;
            $model->numering = $model->numering ?? self::getOrder($parent_id);
        });
        self::created(function ($model) {
            Cache::forget('admin-menu');
        });
        self::updated(function ($model) {
            Cache::forget('admin-menu');
        });
        self::deleted(function ($model) {
            Cache::forget('admin-menu');
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

    public function scopeOfStatus($query, $status)
    {
        return $query->where('admin_menus.status', $status);
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('admin_menus.code', $code);
    }

    public function scopeParentId($query, $parent_id)
    {
        return $query->where('admin_menus.parent_id', $parent_id);
    }

    public function parent()
    {
        return $this->belongsTo(AdminMenu::class, 'parent_id');
    }

    public function menus()
    {
        return $this->hasMany(AdminMenu::class, 'parent_id', 'id')->orderBy('numering', 'asc');
    }

    public static function getOrder($parent_id)
    {
        $max = AdminMenu::parentId($parent_id)->max('numering') ?? 0;
        return $max + 1;
    }
}
