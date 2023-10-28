<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $table = 'shifts';

    protected $fillable = [
        'store_id',
        'code',
        'name',
        'start',
        'end',
        'salary',
        'status',
        'description',
    ];

    protected $hidden = [];

    protected $casts = [
        'status' => 'boolean',
        'store_id' => 'integer',
        'salary' => 'integer',
        'start' => 'datetime:Y-m-d H:i:s',
        'end' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function scopeOfCode($query, $code)
    {
        return $query->where('shifts.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('shifts.status', $status);
    }

    public function scopeStoreId($query, $store_id)
    {
        return $query->where('shifts.store_id', $store_id);
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
