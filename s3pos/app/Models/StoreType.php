<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreType extends Model
{
    use HasFactory;
    protected $table = 'store_types';

    protected $fillable = [
        'code',
        'name',
        'status',
    ];

    protected $hidden = [];

    protected $casts = [
        'status' => 'boolean',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function scopeOfCode($query, $code)
    {
        return $query->where('store_types.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('store_types.status', $status);
    }
}
