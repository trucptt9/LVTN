<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleGroup extends Model
{
    use HasFactory;
    protected $table = 'module_groups';

    protected $fillable = [
        'code',
        'name',
        'status',
        'numering'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'status' => 'boolean',
        'numering' => 'integer'
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

    public function modules()
    {
        return $this->hasMany(Module::class, 'group_id', 'id');
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('module_groups.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('module_groups.status', $status);
        }
        return $query->where('module_groups.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('module_groups.code', 'LIKE', "%$search%")
                ->orWhere('module_groups.name', 'LIKE', "%$search%");
        });
    }

    public static function getOrder()
    {
        $max = ModuleGroup::max('numering') ?? 0;
        return $max + 1;
    }
}
