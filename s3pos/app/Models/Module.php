<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table = 'modules';

    protected $fillable = [
        'code',
        'name',
        'status',
        'description',
        'numering',
        'group_id',
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'numering' => 'integer',
        'group_id' => 'integer',
        'status' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? true;
            $model->code = $model->code ?? generateRandomString();
            $model->numering = $model->numering ?? self::getOrder($model->group_id);
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
        return $query->where('modules.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('modules.status', $status);
        }
        return $query->where('modules.status', $status);
    }

    public function scopeGroupId($query, $group_id)
    {
        if (is_array($group_id)) {
            return $query->whereIn('modules.group_id', $group_id);
        }
        return $query->where('modules.group_id', $group_id);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('modules.code', 'LIKE', "%$search%")
                ->orWhere('modules.name', 'LIKE', "%$search%");
        });
    }

    public function group()
    {
        return $this->belongsTo(ModuleGroup::class, 'group_id');
    }

    public static function getOrder($group_id)
    {
        $max = Module::groupId($group_id)->max('numering') ?? 0;
        return $max + 1;
    }
}
