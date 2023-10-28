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
        'is_menu'
    ];

    protected $hidden = [];

    protected $casts = [
        'status' => 'boolean',
        'group_id' => 'integer',
        'price' => 'integer',
        'cost' => 'integer',
        'is_menu' => 'boolean',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? true;
            $model->code = $model->code ?? generateRandomString();
            $model->price = $model->price ?? 0;
            $model->cost = $model->cost ?? 0;
            $model->is_menu = $model->is_menu ?? true;
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
        return $query->where('toppings.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('toppings.status', $status);
    }

    public function scopeGroupId($query, $group_id)
    {
        return $query->where('toppings.group_id', $group_id);
    }

    public function scopeIsMenu($query, $is_menu)
    {
        return $query->where('toppings.is_menu', $is_menu);
    }

    public function group()
    {
        return $this->belongsTo(ToppingGroup::class, 'group_id');
    }
}
