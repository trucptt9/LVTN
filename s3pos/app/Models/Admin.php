<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'email',
        'avatar',
        'phone',
        'email',
        'password',
        'gender',
        'is_supper',
        'is_root',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'gender' => 'integer',
        'is_supper' => 'integer',
        'is_root' => 'integer',
        'status' => 'integer',
        'password' => 'hashed',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const GENDER_OTHER = 3;

    public static function get_gender($gender = '')
    {
        $types = [
            self::GENDER_MALE => ['Nam', 'success', COLOR_SUCCESS],
            self::GENDER_FEMALE => ['Nữ', 'warning', COLOR_WARNING],
            self::GENDER_OTHER => ['Khác', 'secondary', COLOR_SECONDARY],
        ];
        return $gender == '' ? $types : $types["$gender"];
    }

    const IS_SUPPER = 1;
    const NOT_SUPPER = 2;

    const ROOT = 1;
    const NOT_ROOT = 2;

    const STATUS_UN_ACTIVE = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_SUSPEND = 3;

    public static function get_status($status = '')
    {
        $types = [
            self::STATUS_UN_ACTIVE => ['Chưa kích hoạt', 'secondary', COLOR_SECONDARY],
            self::STATUS_ACTIVE => ['Đang kích hoạt', 'success', COLOR_SUCCESS],
            self::STATUS_SUSPEND => ['Tạm ngưng', 'warning', COLOR_WARNING],
        ];
        return $status == '' ? $types : $types["$status"];
    }

    public function history()
    {
        return $this->hasMany(AdminHistory::class, 'admin_id', 'id');
    }

    public function scopeOfRoot($query, $is_root)
    {
        return $query->where('admins.is_root', $is_root);
    }

    public function scopeOfSupper($query, $is_supper)
    {
        return $query->where('admins.is_supper', $is_supper);
    }

    public function scopeOfGender($query, $gender)
    {
        return $query->where('admins.gender', $gender);
    }

    public function scopeOfEmail($query, $email)
    {
        if (is_array($email)) {
            return $query->whereIn('admins.email', $email);
        }
        return $query->where('admins.email', $email);
    }

    public function scopeOfStatus($query, $status)
    {
        if (is_array($status)) {
            return $query->whereIn('admins.status', $status);
        }
        return $query->where('admins.status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('admins.email', 'LIKE', "%$search%")
                ->orWhere('admins.name', 'LIKE', "%$search%")
                ->orWhere('admins.code', 'LIKE', "%$search%")
                ->orWhere('admins.phone', 'LIKE', "%$search%");
        });
    }
}
