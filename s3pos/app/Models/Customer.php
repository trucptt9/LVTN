<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';

    protected $fillable = [
        'store_id',
        'group_id',
        'code',
        'name',
        'phone',
        'email',
        'address',
        'point_current',
        'status',
        'description'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'group_id' => 'integer',
        'store_id' => 'integer',
        'point_current' => 'integer',
        'status' => 'boolean'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? true;
            $model->code = $model->code ?? generateRandomString();
            $model->point_current = $model->point_current ?? 0;
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';

    public static function get_status($status = '')
    {
        $types = [
            self::STATUS_ACTIVE => ['Đang kích hoạt', 'success', COLOR_SUCCESS],
            self::STATUS_BLOCKED => ['Tạm ngưng', 'danger', COLOR_DANGER],
        ];
        return $status == '' ? $types : $types["$status"];
    }

    public function group()
    {
        return $this->belongsTo(CustomerGroup::class, 'group_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('customers.code', $code);
    }

    public function scopeStoreId($query, $store_id)
    {
        if (is_array($store_id)) {
            return $query->whereIn('customers.store_id', $store_id);
        }
        return $query->where('customers.store_id', $store_id);
    }

    public function scopeGroupId($query, $group_id)
    {
        if (is_array($group_id)) {
            return $query->whereIn('customers.group_id', $group_id);
        }
        return $query->where('customers.group_id', $group_id);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('customers.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('customers.code', 'LIKE', "%$search%")
                ->orWhere('customers.name', 'LIKE', "%$search%")
                ->orWhere('customers.phone', 'LIKE', "%$search%")
                ->orWhere('customers.email', 'LIKE', "%$search%");
        });
    }
}
