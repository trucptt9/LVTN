<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';

    protected $fillable = [
        'store_id',
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
            Cache::forget('user-menu');
        });
        self::updated(function ($model) {
            Cache::forget('user-menu');
        });
        self::deleted(function ($model) {
            Cache::forget('user-menu');
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
        return $query->where('menus.status', $status);
    }

    public function scopeStoreId($query, $store_id)
    {
        return $query->where('menus.store_id', $store_id);
    }

    public function scopeParentId($query, $parent_id)
    {
        return $query->where('menus.parent_id', $parent_id);
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id')->orderBy('numering', 'asc');
    }

    public static function getOrder($parent_id)
    {
        $max = Menu::parentId($parent_id)->max('numering') ?? 0;
        return $max + 1;
    }
}
