<?php

namespace Database\Seeders;

use App\Models\AdminSetting;
use App\Models\AdminSettingGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedAdminSetting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_setting_groups')->delete();
        DB::table('admin_settings')->delete();

        // general
        $general = AdminSettingGroup::create([
            'code' => 'general',
            'name' => 'Hệ thống',
            'icon' => '<i class="far fa-user fa-fw"></i>'
        ]);
        AdminSetting::create([
            'group_id' => $general->id,
            'code' => 'app-name',
            'name' => 'Tên hệ thống',
            'value' => 'Hệ thống quản lý bán hàng TTPOS'
        ]);
        AdminSetting::create([
            'group_id' => $general->id,
            'code' => 'short-name',
            'name' => 'Tên viết tắt',
            'value' => 'TTPOS'
        ]);
        AdminSetting::create([
            'group_id' => $general->id,
            'code' => 'development-by',
            'name' => 'Phát triển bởi',
            'value' => 'TT Dev'
        ]);
        AdminSetting::create([
            'group_id' => $general->id,
            'code' => 'copyright-by',
            'name' => 'Sơ hữu bởi',
            'value' => 'TT Group'
        ]);
        AdminSetting::create([
            'group_id' => $general->id,
            'code' => 'app-logo',
            'name' => 'Logo',
<<<<<<< HEAD
            'value' => 'files/logo.png',
=======
            'value' => 'admin/assets/img/logo.png',
>>>>>>> 33dc2908c96ac78ce7f9e0f86e699d7dac34b851
            'type' => AdminSetting::TYPE_FILE,
        ]);
        AdminSetting::create([
            'group_id' => $general->id,
            'code' => 'app-favicon',
            'name' => 'Logo',
<<<<<<< HEAD
            'value' => 'files/favicon.png',
=======
            'value' => 'admin/assets/img/favicon.png',
>>>>>>> 33dc2908c96ac78ce7f9e0f86e699d7dac34b851
            'type' => AdminSetting::TYPE_FILE,
        ]);

        // payment
        $payment = AdminSettingGroup::create([
            'code' => 'payment',
            'name' => 'Thanh toán',
            'icon' => '<i class="far fa-credit-card fa-fw"></i>'
        ]);
        AdminSetting::create([
            'group_id' => $payment->id,
            'code' => 'accountNo',
            'name' => 'Số tài khoản nhận',
            'value' => '0111000235360'
        ]);
        AdminSetting::create([
            'group_id' => $payment->id,
            'code' => 'accountName',
            'name' => 'Tên tài khoản nhận',
            'value' => 'LAM THANH TRUNG'
        ]);
        AdminSetting::create([
            'group_id' => $payment->id,
            'code' => 'bankCode',
            'name' => 'Mã ngân hàng',
            'value' => 'VCB',
            'type' => AdminSetting::TYPE_SELECT
        ]);
    }
}
