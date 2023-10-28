<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffHistory extends Model
{
    use HasFactory;
    protected $table = 'staff_histories';

    protected $fillable = [
        'staff_id',
        'note',
        'action',
        'link',
    ];

    protected $hidden = [];

    protected $casts = [
        'staff_id' => 'integer',
        'data_json' => 'json',
        'created_at' => 'datetime'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function scopeStaffId($query, $staff_id)
    {
        if (is_array($staff_id)) {
            return $query->whereIn('staff_histories.staff_id', $staff_id);
        }
        return $query->where('staff_histories.staff_id', $staff_id);
    }

    public function scopeOfDate($query, $from, $to)
    {
        $_from = Carbon::parse($from)->startOfDay();
        $_to = Carbon::parse($to)->endOfDay();
        return $query->whereBetween('staff_histories.created_at', [$_from, $_to]);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('staff_histories.note', 'LIKE', "%$search%");
        });
    }
}
