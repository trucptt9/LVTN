<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'stores';

    protected $fillable = [
        'brand_id',
        'type_id',
        'code',
        'name',
        'phone',
        'address',
        'status',
        'description',
    ];

    protected $hidden = [];

    protected $casts = [
        'brand_id' => 'integer',
        'type_id' => 'integer',
        'status' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? true;
            $model->code = $model->code ?? generateRandomString();
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
        return $query->where('stores.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('stores.status', $status);
    }

    public function scopeBrandId($query, $brand_id)
    {
        return $query->where('stores.brand_id', $brand_id);
    }

    public function scopeTypeId($query, $type_id)
    {
        return $query->where('stores.type_id', $type_id);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function type()
    {
        return $this->belongsTo(StoreType::class, 'type_id');
    }
}
