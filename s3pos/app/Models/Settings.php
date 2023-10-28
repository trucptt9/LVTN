<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $table = 'settings';

    protected $fillable = [
        'store_id',
        'code',
        'name',
        'description',
        'type',
        'value',
        'data',
        'numering',
        'group_id',
        'status',
    ];

    protected $hidden = [];

    protected $casts = [
        'group_id' => 'integer',
        'numering' => 'integer',
        'status' => 'boolean',
    ];

    const TYPE_TEXT = 0;
    const TYPE_FILE = 1;
    const TYPE_SELECT = 2;
    const TYPE_RADIO = 3;

    public function scopeOfCode($query, $code)
    {
        return $query->where('settings.code', $code);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('settings.type', $type);
    }

    public function scopeGroupId($query, $group_id)
    {
        return $query->where('settings.group_id', $group_id);
    }

    public function scopeStoreId($query, $store_id)
    {
        return $query->where('settings.store_id', $store_id);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('settings.status', $status);
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function group()
    {
        return $this->belongsTo(SettingGroup::class, 'group_id');
    }

    public static function getOrder($group_id, $store_id)
    {
        $max = Settings::groupId($group_id)->storeId($store_id)->ofStatus(true)->max('numering') ?? 0;
        return $max + 1;
    }
}
