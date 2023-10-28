<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillService extends Model
{
    use HasFactory;
    protected $table = 'bill_services';

    protected $fillable = [
        'store_id',
        'code',
        'discount',
        'discount_type',
        'sub_total',
        'total',
        'day_end',
        'day_start',
        'description',
        'status_payment',
        'status'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'store_id' => 'integer',
        'sub_total' => 'integer',
        'total' => 'integer',
        'status_payment' => 'integer',
        'status' => 'integer',
        'day_end' => 'date:Y-m-d',
        'day_start' => 'date:Y-m-d',
    ];

    const STATUS_TMP = 1;
    const STATUS_FINISH = 2;

    public static function get_status($status = '')
    {
        $types = [
            self::STATUS_TMP => ['Đơn tạm', 'secondary', COLOR_SECONDARY],
            self::STATUS_FINISH => ['Đã kết thúc', 'success', COLOR_SUCCESS],
        ];
        return $status == '' ? $types : $types["$status"];
    }

    const UN_PAID = 1;
    const PAID = 2;

    public static function get_status_payment($status = '')
    {
        $types = [
            self::UN_PAID => ['Chưa thanh toán', 'secondary', COLOR_SECONDARY],
            self::PAID => ['Đã thanh toán', 'success', COLOR_SUCCESS],
        ];
        return $status == '' ? $types : $types["$status"];
    }

    const TYPE_VND = 1;
    const TYPE_PERCENT = 2;

    public static function get_type($type = '')
    {
        $types = [
            self::TYPE_VND => ['VND', 'secondary', COLOR_SECONDARY],
            self::TYPE_PERCENT => ['%', 'success', COLOR_SUCCESS],
        ];
        return $type == '' ? $types : $types["$type"];
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
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

    public function scopeStoreId($query, $store_id)
    {
        return $query->where('bill_services.store_id', $store_id);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('bill_services.code', 'LIKE', "%$search%");
        });
    }
}
