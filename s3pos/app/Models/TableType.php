<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableType extends Model
{
    use HasFactory;
    protected $table = 'table_types';

    protected $fillable = [
        'store_id',
        'code',
        'name',
        'status'
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
        return $query->where('table_types.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('table_types.status', $status);
    }

    public function scopeStoreId($query, $store_id)
    {
        return $query->where('table_types.store_id', $store_id);
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
