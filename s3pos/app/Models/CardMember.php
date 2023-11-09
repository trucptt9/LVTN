<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardMember extends Model
{
    use HasFactory;
    protected $table = 'customer_groups';

    protected $fillable = [
        'store_id',
        'code',
        'name',
        'status',
        'default',
        'description'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'store_id' => 'integer',
        'default' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_ACTIVE;
            $model->default = $model->default ?? 'false';
            $model->code = $model->code ?? generateRandomString();
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

    public function customers()
    {
        return $this->hasMany(Customer::class, 'group_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function scopeStoreId($query, $store_id)
    {
        return $query->where('customer_groups.store_id', $store_id);
    }

    public function scopeOfDefault($query, $default)
    {
        return $query->where('customer_groups.default', $default);
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('customer_groups.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('customer_groups.status', $status);
        }
        return $query->where('customer_groups.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('customer_groups.code', 'LIKE', "%$search%")
                ->orWhere('customer_groups.name', 'LIKE', "%$search%");
        });
    }
}