<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortPayment extends Model
{
    use HasFactory;
    protected $table = 'port_payments';

    protected $fillable = [
        'method_id',
        'code',
        'name',
        'status',
        'description'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'status' => 'integer',
        'method_id' => 'integer',
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_SUSPEND = 2;

    public static function get_status($status = '')
    {
        $types = [
            self::STATUS_ACTIVE => ['Đang hoạt động', 'success', COLOR_SUCCESS],
            self::STATUS_SUSPEND => ['Tạm ngưng', 'light', COLOR_LIGHT],
        ];
        return $status == '' ? $types : $types["$status"];
    }

    public function method()
    {
        return $this->belongsTo(MethodPayment::class, 'method_id');
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('port_payments.code', $code);
    }

    public function scopeGroupId($query, $method_id)
    {
        if (is_array($method_id)) {
            return $query->whereIn('port_payments.method_id', $method_id);
        }
        return $query->where('port_payments.method_id', $method_id);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('port_payments.status', $status);
        }
        return $query->where('port_payments.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('port_payments.code', 'LIKE', "%$search%")
                ->orWhere('port_payments.name', 'LIKE', "%$search%");
        });
    }
}
