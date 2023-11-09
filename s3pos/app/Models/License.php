<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    protected $table = 'licenses';

    protected $fillable = [
        'store_id',
        'package_id',
        'key',
        'total_month',
        'date_start',
        'date_end',
        'total_amount',
        'status',
        'note'
    ];

    protected $hidden = ['key'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'store_id' => 'integer',
        'total_month' => 'integer',
        'total_amount' => 'integer',
        'package_id' => 'integer',
        'date_start' => 'datetime:Y-m-d H:i:s',
        'date_end' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_UN_ACTIVE;
            $model->key = $model->key ?? generateRandomString(20);
            $model->total_amount = $model->total_amount ?? 0;
            $start = $model->date_start ?? now();
            $month = $model->total_month ?? 1;
            $model->total_month = $month;
            $model->date_start = $start;
            $model->date_end = Carbon::parse($start)->addMonths($month);
        });
        self::created(function ($model) {
            save_log_action_admin("Tạo mới license #$model->key");
        });
        self::updated(function ($model) {
            save_log_action_admin("Cập nhật thông tin license #$model->key");
        });
        self::deleted(function ($model) {
            save_log_action_admin("Xóa license #$model->key");
        });
    }

    const STATUS_UN_ACTIVE = 'un_active';
    const STATUS_ACTIVE = 'active';
    const STATUS_SUSPEND = 'blocked';

    public static function get_status($status = '')
    {
        $types = [
            self::STATUS_UN_ACTIVE => ['Chưa kích hoạt', 'secondary', COLOR_SECONDARY],
            self::STATUS_ACTIVE => ['Đang kích hoạt', 'success', COLOR_SUCCESS],
            self::STATUS_SUSPEND => ['Đã khóa', 'danger', COLOR_DANGER],
        ];
        return $status == '' ? $types : $types["$status"];
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function payment()
    {
        return $this->hasOne(BillService::class, 'license_id', 'id');
    }

    public function scopeOfKey($query, $key)
    {
        return $query->where('licenses.key', $key);
    }

    public function scopeExpired($query)
    {
        return $query->where('licenses.date_end', '<=', now());
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('licenses.status', $status);
        }
        return $query->where('licenses.status', $status);
    }

    public function scopeStoreId($query, $store_id)
    {
        if (is_array($store_id)) {
            return $query->whereIn('licenses.store_id', $store_id);
        }
        return $query->where('licenses.store_id', $store_id);
    }

    public function scopePackageId($query, $package_id)
    {
        if (is_array($package_id)) {
            return $query->whereIn('licenses.package_id', $package_id);
        }
        return $query->where('licenses.package_id', $package_id);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('licenses.key', 'LIKE', "%$search%");
        });
    }
}
