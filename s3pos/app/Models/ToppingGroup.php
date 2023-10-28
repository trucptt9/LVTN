<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToppingGroup extends Model
{
    use HasFactory;
    protected $table = 'topping_groups';

    protected $fillable = [
        'store_id',
        'code',
        'name',
        'status',
        'image'
    ];

    protected $hidden = [];

    protected $casts = [
        'status' => 'boolean',
        'store_id' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function scopeOfCode($query, $code)
    {
        return $query->where('topping_groups.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('topping_groups.status', $status);
    }

    public function scopeStoreId($query, $store_id)
    {
        return $query->where('topping_groups.store_id', $store_id);
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
