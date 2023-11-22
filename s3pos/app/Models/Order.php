<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'code',
        'table_id',
        'customer_id',
        'customer_name',
        'method_payment_id',
        'sale_source_id',
        'promotion_id',
        'staff_id',
        'store_id',
        'order_start',
        'order_end',
        'vat',
        'vat_total',
        'discount',
        'discount_type',
        'discount_total',
        'sub_total',
        'total',
        'cost',
        'profit',
        'description',
        'status'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'table_id' => 'integer',
        'customer_id' => 'integer',
        'customer_name' => 'string',
        'method_payment_id' => 'integer',
        'sale_source_id' => 'integer',
        'promotion_id' => 'integer',
        'staff_id' => 'integer',
        'store_id' => 'integer',
        'vat' => 'integer',
        'vat_total' => 'integer',
        'discount' => 'integer',
        'discount_total' => 'integer',
        'sub_total' => 'integer',
        'cost' => 'integer',
        'total' => 'integer',
        'profit' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_TMP;
            $model->code = $model->code ?? generateRandomString();
            $model->vat = $model->vat ?? 0;
            $model->order_start = $model->order_start ?? now();
            $model->discount = $model->discount ?? 0;
            $model->discount_type = $model->discount_type ?? self::TYPE_PERCENT;
        });
        self::created(function ($model) {
            save_log_action("Tạo mới đơn hàng #$model->code");
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
            save_log_action("Xóa đơn hàng #$model->code");
        });
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

    const STATUS_TMP = 'tmp';
    const STATUS_FINISH = 'finish';
    const STATUS_DESTROY = 'desctroy';

    public static function get_status($status = '')
    {
        $types = [
            self::STATUS_TMP => ['Đơn tạm', 'secondary', COLOR_SECONDARY],  
            self::STATUS_FINISH => ['Đã kết thúc', 'success', COLOR_SUCCESS],
            self::STATUS_DESTROY => ['Đã hủy', 'danger', COLOR_DANGER],
        ];
        return $status == '' ? $types : $types["$status"];
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function methodPayment()
    {
        return $this->belongsTo(MethodPayment::class, 'method_payment_id');
    }

    public function saleSource()
    {
        return $this->belongsTo(SaleSource::class, 'sale_source_id');
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function scopeBetween($query, $from, $to)
    {
        $_from = Carbon::parse($from)->startOfDay();
        $_to = Carbon::parse($to)->endOfDay();
        return $query->whereBetween('orders.order_start', [$_from, $_to]);
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('orders.code', $code);
    }

    public function scopeTableId($query, $table_id)
    {
        return $query->where('orders.table_id', $table_id);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('orders.status', $status);
        }
        return $query->where('orders.status', $status);
    }

    public function scopeCustomerId($query, $customer_id)
    {
        return $query->where('orders.customer_id', $customer_id);
    }

    public function scopePortalPaymentId($query, $method_payment_id)
    {
        return $query->where('orders.method_payment_id', $method_payment_id);
    }

    public function scopeSaleChannelId($query, $sale_source_id)
    {
        return $query->where('orders.sale_source_id', $sale_source_id);
    }

    public function scopePromotionId($query, $promotion_id)
    {
        return $query->where('orders.promotion_id', $promotion_id);
    }

    public function scopeStaffId($query, $staff_id)
    {
        return $query->where('orders.staff_id', $staff_id);
    }

    public function scopeStoreId($query, $store_id)
    {
        return $query->where('orders.store_id', $store_id);
    }

    public function scopeDiscountType($query, $discount_type)
    {
        return $query->where('orders.discount_type', $discount_type);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('orders.code', 'LIKE', "%$search%");
        });
    }
}