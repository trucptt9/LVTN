<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\ModuleGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedModule extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modules')->delete();

        // store
        Module::create([
            'code' => 'staff',
            'name' => 'Nhân viên',
            'icon' => '<i class="fas fa-user-friends"></i>'
        ]);
        Module::create([
            'code' => 'department',
            'name' => 'Phòng ban',
            'icon' => '<i class="fas fa-layer-group"></i>'
        ]);
        Module::create([
            'code' => 'position',
            'name' => 'Chức vụ',
            'icon' => '<i class="fas fa-pencil-ruler"></i>'
        ]);
        Module::create([
            'code' => 'shift',
            'name' => 'Ca làm việc',
            'icon' => '<i class="fas fa-calendar-alt"></i>'
        ]);
        Module::create([
            'code' => 'area',
            'name' => 'Khu vực bàn',
            'icon' => '<i class="far fa-clone"></i>'
        ]);
        Module::create([
            'code' => 'table',
            'name' => 'Bàn',
            'icon' => '<i class="fas fa-table"></i>'
        ]);

        // product
        Module::create([
            'code' => 'product_category',
            'name' => 'Danh mục sản phẩm',
            'icon' => '<i class="fas fa-th-large"></i>'
        ]);
        Module::create([
            'code' => 'product',
            'name' => 'Sản phẩm',
            'icon' => '<i class="fas fa-cube"></i>'
        ]);
        Module::create([
            'code' => 'topping_category',
            'name' => 'Danh mục topping',
            'icon' => '<i class="fas fa-th"></i>'
        ]);
        Module::create([
            'code' => 'topping',
            'name' => 'Topping',
            'icon' => '<i class="fab fa-cuttlefish"></i>'
        ]);

        // promotion
        Module::create([
            'code' => 'promotion',
            'name' => 'Chương trình khuyến mãi',
            'icon' => '<i class="fas fa-gift"></i>'
        ]);
        Module::create([
            'code' => 'coupon',
            'name' => 'Phiếu mua hàng',
            'icon' => '<i class="fas fa-percentage"></i>'
        ]);
        Module::create([
            'code' => 'customer_group',
            'name' => 'Danh mục khách hàng',
            'icon' => '<i class="fas fa-portrait"></i>'
        ]);
        Module::create([
            'code' => 'customer',
            'name' => 'Danh sách khách hàng',
            'icon' => '<i class="fas fa-user-circle"></i>'
        ]);
        Module::create([
            'code' => 'card_member',
            'name' => 'Thẻ thành viên',
            'icon' => '<i class="far fa-address-card"></i>'
        ]);
        Module::create([
            'code' => 'booking',
            'name' => 'Quản lý đặt lịch',
            'icon' => '<i class="fas fa-calendar-alt"></i>'
        ]);

        // warehouse
        Module::create([
            'code' => 'warehouse',
            'name' => 'Kho hàng',
            'icon' => '<i class="fas fa-warehouse"></i>'
        ]);
        Module::create([
            'code' => 'import',
            'name' => 'Nhập hàng',
            'icon' => '<i class="fas fa-file-download"></i>'
        ]);
        Module::create([
            'code' => 'export',
            'name' => 'Xuất hàng',
            'icon' => '<i class="fas fa-upload"></i>'
        ]);
        Module::create([
            'code' => 'material',
            'name' => 'Nguyên vật liệu',
            'icon' => '<i class="fas fa-th-list"></i>'
        ]);
        Module::create([
            'code' => 'supplier',
            'name' => 'Nhà cung cấp',
            'icon' => '<i class="fas fa-people-arrows"></i>'
        ]);
        Module::create([
            'code' => 'unit',
            'name' => 'Đơn vị',
            'icon' => '<i class="fab fa-untappd"></i>'
        ]);

        // report
        Module::create([
            'code' => 'order',
            'name' => 'Đơn hàng',
            'icon' => '<i class="far fa-file-alt"></i>'
        ]);
        Module::create([
            'code' => 'report',
            'name' => 'Báo cáo',
            'icon' => '<i class="fas fa-chart-pie fs-4 pe-2"></i>'
        ]);

        // other
        Module::create([
            'code' => 'setting',
            'name' => 'Cài đặt',
            'icon' => '<i class="fas fa-cog fs-4 pe-2"></i>'
        ]);
        Module::create([
            'code' => 'staff_history',
            'name' => 'Nhật ký',
            'icon' => '<i class="fas fa-history"></i>'
        ]);
    }
}
