<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MethodPayment extends Model
{
    use HasFactory;
    protected $table = 'method_payments';

    protected $fillable = [
        'store_id',
        'code',
        'name',
        'status',
        'description',
        'default'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'store_id' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->default = $model->default ?? 'false';
            $model->status = $model->status ?? self::STATUS_ACTIVE;
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

    public function channels()
    {
        return $this->hasMany(PortPayment::class, 'method_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function scopeOfDefault($query, $default)
    {
        return $query->where('method_payments.default', $default);
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('method_payments.code', $code);
    }

    public function scopeStoreId($query, $store_id)
    {
        if (is_array($store_id)) {
            return $query->whereIn('method_payments.store_id', $store_id);
        }
        return $query->where('method_payments.store_id', $store_id);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('method_payments.status', $status);
        }
        return $query->where('method_payments.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('method_payments.code', 'LIKE', "%$search%")
                ->orWhere('method_payments.name', 'LIKE', "%$search%");
        });
    }
}
