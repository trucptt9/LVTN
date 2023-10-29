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
        DB::table('module_groups')->delete();
        DB::table('modules')->delete();

        // store
        $store = ModuleGroup::create([
            'code' => 'store',
            'name' => 'Cửa hàng',
            'icon' => '<i class="fas fa-store"></i>'
        ]);
        Module::create([
            'group_id' => $store->id,
            'code' => 'store',
            'name' => 'Cửa hàng',
            'icon' => '<i class="fas fa-store"></i>'
        ]);
        Module::create([
            'group_id' => $store->id,
            'code' => 'staff',
            'name' => 'Nhân viên',
            'icon' => '<i class="fas fa-user-friends"></i>'
        ]);
        Module::create([
            'group_id' => $store->id,
            'code' => 'role',
            'name' => 'Quyền quản trị',
            'icon' => '<i class="fas fa-pencil-ruler"></i>'
        ]);
        Module::create([
            'group_id' => $store->id,
            'code' => 'department',
            'name' => 'Phòng ban',
            'icon' => '<i class="fas fa-layer-group"></i>'
        ]);
        Module::create([
            'group_id' => $store->id,
            'code' => 'shift',
            'name' => 'Ca làm việc',
            'icon' => '<i class="fas fa-calendar-alt"></i>'
        ]);
        Module::create([
            'group_id' => $store->id,
            'code' => 'area',
            'name' => 'Khu vực bàn',
            'icon' => '<i class="far fa-clone"></i>'
        ]);
        Module::create([
            'group_id' => $store->id,
            'code' => 'table',
            'name' => 'Bàn',
            'icon' => '<i class="fas fa-table"></i>'
        ]);

        // product
        $product = ModuleGroup::create([
            'code' => 'product',
            'name' => 'Sản phẩm',
            'icon' => '<i class="fas fa-cubes"></i>'
        ]);
        Module::create([
            'group_id' => $product->id,
            'code' => 'product_category',
            'name' => 'Danh mục sản phẩm',
            'icon' => '<i class="fas fa-th-large"></i>'
        ]);
        Module::create([
            'group_id' => $product->id,
            'code' => 'product',
            'name' => 'Sản phẩm',
            'icon' => '<i class="fas fa-cube"></i>'
        ]);
        Module::create([
            'group_id' => $product->id,
            'code' => 'topping_category',
            'name' => 'Danh mục topping',
            'icon' => '<i class="fas fa-th"></i>'
        ]);
        Module::create([
            'group_id' => $product->id,
            'code' => 'topping',
            'name' => 'Topping',
            'icon' => '<i class="fab fa-cuttlefish"></i>'
        ]);

        // promotion
        $promotion = ModuleGroup::create([
            'code' => 'promotion',
            'name' => 'Khuyến mãi',
            'icon' => '<i class="fas fa-gifts"></i>'
        ]);
        Module::create([
            'group_id' => $promotion->id,
            'code' => 'promotion',
            'name' => 'Chương trình khuyến mãi',
            'icon' => '<i class="fas fa-gift"></i>'
        ]);
        Module::create([
            'group_id' => $promotion->id,
            'code' => 'coupon',
            'name' => 'Phiếu mua hàng',
            'icon' => '<i class="fas fa-percentage"></i>'
        ]);
        Module::create([
            'group_id' => $promotion->id,
            'code' => 'customer_group',
            'name' => 'Danh mục khách hàng',
            'icon' => '<i class="fas fa-portrait"></i>'
        ]);
        Module::create([
            'group_id' => $promotion->id,
            'code' => 'customer',
            'name' => 'Danh sách khách hàng',
            'icon' => '<i class="fas fa-user-circle"></i>'
        ]);

        // warehouse
        $warehouse = ModuleGroup::create([
            'code' => 'warehouse',
            'name' => 'Quản lý kho',
            'icon' => '<i class="fas fa-warehouse"></i>'
        ]);
        Module::create([
            'group_id' => $warehouse->id,
            'code' => 'warehouse',
            'name' => 'Kho hàng',
            'icon' => '<i class="fas fa-warehouse"></i>'
        ]);
        Module::create([
            'group_id' => $warehouse->id,
            'code' => 'import',
            'name' => 'Nhập hàng',
            'icon' => '<i class="fas fa-file-download"></i>'
        ]);
        Module::create([
            'group_id' => $warehouse->id,
            'code' => 'export',
            'name' => 'Xuất hàng',
            'icon' => '<i class="fas fa-upload"></i>'
        ]);
        Module::create([
            'group_id' => $warehouse->id,
            'code' => 'material',
            'name' => 'Nguyên vật liệu',
            'icon' => '<i class="fas fa-th-list"></i>'
        ]);
        Module::create([
            'group_id' => $warehouse->id,
            'code' => 'supplier',
            'name' => 'Nhà cung cấp',
            'icon' => '<i class="fas fa-people-arrows"></i>'
        ]);
        Module::create([
            'group_id' => $warehouse->id,
            'code' => 'unit',
            'name' => 'Đơn vị',
            'icon' => '<i class="fab fa-untappd"></i>'
        ]);

        // report
        $report = ModuleGroup::create([
            'code' => 'report',
            'name' => 'Báo cáo',
            'icon' => '<i class="fas fa-chart-pie"></i>'
        ]);
        Module::create([
            'group_id' => $report->id,
            'code' => 'order',
            'name' => 'Đơn hàng',
            'icon' => '<i class="far fa-file-alt"></i>'
        ]);

        // other
        $other = ModuleGroup::create([
            'code' => 'other',
            'name' => 'Khác',
            'icon' => '<i class="fas fa-cog"></i>'
        ]);
        Module::create([
            'group_id' => $other->id,
            'code' => 'staff_history',
            'name' => 'Nhật ký',
            'icon' => '<i class="fas fa-history"></i>'
        ]);
    }
}
