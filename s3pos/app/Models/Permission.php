<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';

    protected $fillable = [
        'staff_id',
        'module',
        'actions',
        
    ];

    protected $hidden = [];

    protected $casts = [
        'staff_id' => 'integer',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            
        });
        self::created(function ($model) {
            
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    public function scopeStaffId($query, $staff_id)
    {
        if (is_array($staff_id)) {
            return $query->whereIn('permissions.staff_id', $staff_id);
        }
        return $query->where('permissions.staff_id', $staff_id);
    }

    public function scopeOfModule($query, $module)
    {
        return $query->where('permissions.module', $module);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module');
    }
}