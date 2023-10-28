<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminHistory extends Model
{
    use HasFactory;
    protected $table = 'admin_histories';

    protected $fillable = [
        'admin_id',
        'note',
        'action',
        'link',
    ];

    protected $hidden = [];

    protected $casts = [
        'admin_id' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->admin_id = $model->admin_id ?? auth('admin')->user()->id;
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function scopeAdminId($query, $admin_id)
    {
        if (is_array($admin_id)) {
            return $query->whereIn('admin_histories.admin_id', $admin_id);
        }
        return $query->where('admin_histories.admin_id', $admin_id);
    }

    public function scopeOfDate($query, $from, $to)
    {
        $_from = Carbon::parse($from)->startOfDay();
        $_to = Carbon::parse($to)->endOfDay();
        return $query->whereBetween('admin_histories.created_at', [$_from, $_to]);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('admin_histories.note', 'LIKE', "%$search%");
        });
    }
}
