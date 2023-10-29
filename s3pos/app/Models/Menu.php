<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';

    protected $fillable = [
        'parent_id',
        'name',
        'url',
        'status',
        'icon',
        'numering'
    ];

    protected $hidden = [];

    protected $casts = [
        'status' => 'boolean',
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
            $model->status = $model->status ?? true;
            $model->parent_id = $parent_id;
            $model->numering = $model->numering ?? self::getOrder($parent_id);
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('menus.status', $status);
    }

    public function scopeParentId($query, $parent_id)
    {
        return $query->where('menus.parent_id', $parent_id);
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
