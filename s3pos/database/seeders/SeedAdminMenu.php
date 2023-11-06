<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedAdminMenu extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_menus')->delete();

        // home
        AdminMenu::create([
            'name' => 'Trang chủ',
            'icon' => '<i class="fas fa-tachometer-alt fs-4 pe-2"></i>',
            'url' => route('admin.index'),
        ]);
        // admin
        $admin = AdminMenu::create([
            'name' => 'Tài khoản',
            'icon' => '<i class="fas fa-users-cog"></i>',
            'url' => route('admin.admin.index'),
        ]);
        AdminMenu::create([
            'code' => 'admin',
            'name' => 'Quản trị viên',
            'icon' => '<i class="fas fa-user-shield"></i>',
            'url' => route('admin.admin.index'),
            'parent_id' => $admin->id,
        ]);
        AdminMenu::create([
            'code' => 'admin_history',
            'name' => 'Nhật ký',
            'icon' => '<i class="fas fa-history"></i>',
            'url' => route('admin.admin_history.index'),
            'parent_id' => $admin->id,
        ]);

        // store
        $store = AdminMenu::create([
            'name' => 'Cửa hàng',
            'icon' => '<i class="fas fa-store fs-4 pe-2"></i>',
            'url' => route('admin.store.index'),
        ]);
        AdminMenu::create([
            'code' => 'area',
            'name' => 'Quản lý cửa hàng',
            'icon' => '<i class="fas fa-store"></i>',
            'url' => route('admin.store.index'),
            'parent_id' => $store->id,
        ]);
        AdminMenu::create([
            'code' => 'business_type',
            'name' => 'Loại hình doanh nghiệp',
            'icon' => '<i class="fas fa-tags"></i>',
            'url' => route('admin.business_type.index'),
            'parent_id' => $store->id,
        ]);

        // license
        $license = AdminMenu::create([
            'name' => 'Bản quyền',
            'icon' => '<i class="fas fa-key"></i>',
            'url' => route('admin.license.index'),
        ]);
        AdminMenu::create([
            'code' => 'package',
            'name' => 'Gói dịch vụ',
            'icon' => '<i class="fas fa-tags"></i>',
            'url' => route('admin.package.index'),
            'parent_id' => $license->id,
        ]);
        AdminMenu::create([
            'code' => 'module',
            'name' => 'Quản lý module',
            'icon' => '<i class="fas fa-tags"></i>',
            'url' => route('admin.module.index'),
            'parent_id' => $license->id,
        ]);
        AdminMenu::create([
            'code' => 'license',
            'name' => 'Quản lý license',
            'icon' => '<i class="fas fa-tags"></i>',
            'url' => route('admin.license.index'),
            'parent_id' => $license->id,
        ]);

        // setting
        AdminMenu::create([
            'code' => 'setting',
            'name' => 'Cài đặt',
            'icon' => '<i class="fas fa-tools"></i>',
            'url' => route('admin.setting.index'),
        ]);
    }
}
