<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerHistory extends Model
{
    use HasFactory;
    protected $table = 'customer_histories';

    protected $fillable = [
        'customer_id',
        'type',
        'point',
        'note',
        'code'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'customer_id' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->type = $model->type ?? self::TYPE_ADD;
            $model->code = $model->code ?? generateRandomString();
            $model->point = $model->point ?? 0;
        });
        self::created(function ($model) {
        });
        self::updated(function ($model) {
        });
        self::deleted(function ($model) {
        });
    }

    const TYPE_ADD = 'add';
    const TYPE_SUB = 'sub';

    public static function get_type($type = '')
    {
        $types = [
            self::TYPE_ADD => ['Tích điểm', 'success', COLOR_SUCCESS],
            self::TYPE_SUB => ['Sử dụng điểm', 'danger', COLOR_DANGER],
        ];
        return $type == '' ? $types : $types["$type"];
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function scopeOfCode($query, $code)
    {
        return $query->where('customer_histories.code', $code);
    }

    public function scopeCustomerId($query, $customer_id)
    {
        if (is_array($customer_id)) {
            return $query->whereIn('customer_histories.customer_id', $customer_id);
        }
        return $query->where('customer_histories.customer_id', $customer_id);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('customer_histories.type', $type);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('customer_histories.code', 'LIKE', "%$search%");
        });
    }
}
