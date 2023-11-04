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
        // store
        AdminMenu::create([
            'code' => 'store',
            'name' => 'Cửa hàng',
            'icon' => '<i class="fas fa-store fs-4 pe-2"></i>',
            'url' => route('admin.store.index'),
        ]);
        // license
        AdminMenu::create([
            'code' => 'license',
            'name' => 'Bản quyền',
            'icon' => '<i class="fas fa-key"></i>',
            'url' => route('admin.license.index'),
        ]);
    }
}
