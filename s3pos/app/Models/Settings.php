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
            $model->numering = $model->numering ?? self::getOrder($model->store_id, $model->group_id);
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    const TYPE_TEXT = 'text';
    const TYPE_FILE = 'file';
    const TYPE_SELECT = 'select';
    const TYPE_RADIO = 'radio';

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
