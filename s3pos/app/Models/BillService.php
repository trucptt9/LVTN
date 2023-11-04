<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillService extends Model
{
    use HasFactory;
    protected $table = 'bill_services';

    protected $fillable = [
        'license_id',
        'code',
        'discount',
        'discount_type',
        'sub_total',
        'total',
        'description',
        'status_payment',
        'status'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'license_id' => 'integer',
        'sub_total' => 'integer',
        'total' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->discount = $model->discount ?? 0;
            $model->discount_type = $model->discount_type ?? self::TYPE_PERCENT;
            $model->sub_total = $model->sub_total ?? 0;
            $model->total = $model->total ?? 0;
            $model->status_payment = $model->status_payment ?? self::UN_PAID;
            $model->status = $model->status ?? self::STATUS_TMP;
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    const STATUS_TMP = 'tmp';
    const STATUS_FINISH = 'finish';

    public static function get_status($status = '')
    {
        $types = [
            self::STATUS_TMP => ['Đơn tạm', 'secondary', COLOR_SECONDARY],
            self::STATUS_FINISH => ['Đã kết thúc', 'success', COLOR_SUCCESS],
        ];
        return $status == '' ? $types : $types["$status"];
    }

    const UN_PAID = 'un_paid';
    const PAID = 'paid';

    public static function get_status_payment($status = '')
    {
        $types = [
            self::UN_PAID => ['Chưa thanh toán', 'secondary', COLOR_SECONDARY],
            self::PAID => ['Đã thanh toán', 'success', COLOR_SUCCESS],
        ];
        return $status == '' ? $types : $types["$status"];
    }

    const TYPE_VND = 'vnd';
    const TYPE_PERCENT = 'percent';

    public static function get_type($type = '')
    {
        $types = [
            self::TYPE_VND => ['VND', 'secondary', COLOR_SECONDARY],
            self::TYPE_PERCENT => ['%', 'success', COLOR_SUCCESS],
        ];
        return $type == '' ? $types : $types["$type"];
    }

    public function license()
    {
        return $this->belongsTo(License::class, 'license_id');
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('bill_services.code', $code);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('bill_services.status', $status);
    }

    public function scopeStatusPayment($query, $status_payment)
    {
        return $query->where('bill_services.status_payment', $status_payment);
    }

    public function scopeDiscountType($query, $discount_type)
    {
        return $query->where('bill_services.discount_type', $discount_type);
    }

    public function scopeStoreId($query, $license_id)
    {
        return $query->where('bill_services.license_id', $license_id);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('bill_services.code', 'LIKE', "%$search%");
        });
    }
}
