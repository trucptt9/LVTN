<?php

namespace Database\Seeders;

use App\Models\SettingGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedSettingGroup extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting_groups')->delete();
        SettingGroup::create([
            'id' => 1,
            'code' => 'notification',
            'name' => 'Thông báo',
            'icon' => '<i class="fas fa-bell"></i>'
        ]);
        SettingGroup::create([
            'id' => 2,
            'code' => 'order',
            'name' => 'Đơn hàng',
            'icon' => '<i class="fas fa-file-invoice-dollar"></i>'
        ]);
    }
}
