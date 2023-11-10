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
        'last_login'
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
        'password' => 'hashed',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->status = $model->status ?? self::STATUS_UN_ACTIVE;
            $model->is_supper = $model->is_supper ?? self::NOT_SUPPER;
            $model->is_root = $model->is_root ?? self::NOT_ROOT;
            $model->gender = $model->gender ?? self::GENDER_OTHER;
            $model->code = $model->code ?? generateRandomString();
        });
        self::created(function ($model) {
            save_log_action_admin("Tạo mới quản trị viên #$model->name");
        });
        self::updated(function ($model) {
            save_log_action_admin("Cập nhật thông tin quản trị viên #$model->name");
        });
        self::deleted(function ($model) {
            save_log_action_admin("Xóa quản trị viên #$model->name");
<<<<<<< HEAD
            remove_s3_file($model->avatar);
=======
>>>>>>> 33dc2908c96ac78ce7f9e0f86e699d7dac34b851
        });
    }

    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';
    const GENDER_OTHER = 'other';

    public static function get_gender($gender = '')
    {
        $types = [
            self::GENDER_MALE => ['Nam', 'success', COLOR_SUCCESS],
            self::GENDER_FEMALE => ['Nữ', 'warning', COLOR_WARNING],
            self::GENDER_OTHER => ['Khác', 'secondary', COLOR_SECONDARY],
        ];
        return $gender == '' ? $types : $types["$gender"];
    }

    const IS_SUPPER = 'true';
    const NOT_SUPPER = 'false';

    const ROOT = 'true';
    const NOT_ROOT = 'false';

    const STATUS_UN_ACTIVE = 'un_active';
    const STATUS_ACTIVE = 'active';
    const STATUS_SUSPEND = 'blocked';

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
