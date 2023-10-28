<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'areas';

    protected $fillable = [
        'store_id',
        'code',
        'name',
        'capacity',
        'priority',
        'status'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'status' => 'boolean',
        'capacity' => 'integer',
        'priority' => 'integer',
        'store_id' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = $model->code ?? generateRandomString();
            $model->capacity = $model->capacity ?? 1;
            $model->status = $model->status ?? true;
            $model->priority = $model->priority ?? self::getOrder($model->store_id);
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    public function tables()
    {
        return $this->hasMany(Table::class, 'area_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('areas.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('areas.status', $status);
        }
        return $query->where('areas.status', $status);
    }

    public function scopeStoreId($query, $store_id)
    {
        if (is_array($store_id)) {
            return $query->whereIn('areas.store_id', $store_id);
        }
        return $query->where('areas.store_id', $store_id);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('areas.code', 'LIKE', "%$search%")
                ->orWhere('areas.name', 'LIKE', "%$search%");
        });
    }

    public static function getOrder($store_id)
    {
        $max = Area::storeId($store_id)->max('priority') ?? 0;
        return $max + 1;
    }
}
