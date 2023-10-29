<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingGroup extends Model
{
    use HasFactory;
    protected $table = 'setting_groups';

    protected $fillable = [
        'code',
        'name',
        'icon',
        'status',
        'numering',
    ];

    protected $hidden = [];

    protected $casts = [
        'status' => 'boolean',
        'numering' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? true;
            $model->code = $model->code ?? generateRandomString();
            $model->numering = $model->numering ?? self::getOrder();
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('setting_groups.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('setting_groups.status', $status);
    }

    public function settings()
    {
        return $this->hasMany(Settings::class, 'group_id', 'id')->active();
    }

    public static function getOrder()
    {
        $max = SettingGroup::max('numering') ?? 0;
        return $max + 1;
    }
}
