<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedMenu extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->delete();
        // home
        Menu::create([
            'name' => 'Trang chủ',
            'icon' => '<i class="fas fa-tachometer-alt fs-4 pe-2"></i>',
            'url' => route('index'),
        ]);

        // store
        $store = Menu::create([
            'name' => 'Cửa hàng',
            'icon' => '<i class="fas fa-store fs-4 pe-2"></i>',
            'url' => route('store.index'),
        ]);
        Menu::create([
            'name' => 'Quản lý cửa hàng',
            'icon' => '<i class="fas fa-store fs-4 pe-2"></i>',
            'url' => route('store.index'),
            'parent_id' => $store->id,
        ]);
        Menu::create([
            'name' => 'Quản lý nhân viên',
            'icon' => '<i class="fas fa-user-friends fs-4 pe-2"></i>',
            'url' => route('staff.index'),
            'parent_id' => $store->id,
        ]);
        Menu::create([
            'name' => 'Quản lý quyền',
            'icon' => '<i class="fas fa-pencil-ruler fs-4 pe-2"></i>',
            'url' => route('role.index'),
            'parent_id' => $store->id,
        ]);
        Menu::create([
            'name' => 'Quản lý phòng ban',
            'icon' => '<i class="fas fa-layer-group fs-4 pe-2"></i>',
            'url' => route('department.index'),
            'parent_id' => $store->id,
        ]);
        Menu::create([
            'name' => 'Ca làm việc',
            'icon' => '<i class="fas fa-calendar-alt fs-4 pe-2"></i>',
            'url' => route('shift.index'),
            'parent_id' => $store->id,
        ]);
        Menu::create([
            'name' => 'Khu vực bàn',
            'icon' => '<i class="far fa-clone fs-4 pe-2"></i>',
            'url' => route('area.index'),
            'parent_id' => $store->id,
        ]);
        Menu::create([
            'name' => 'Quản lý bàn',
            'icon' => '<i class="fas fa-table fs-4 pe-2"></i>',
            'url' => route('table.index'),
            'parent_id' => $store->id,
        ]);

        // product
        $product = Menu::create([
            'name' => 'Sản phẩm',
            'icon' => '<i class="fas fa-cubes fs-4 pe-2"></i>',
            'url' => route('product.index'),
        ]);
        Menu::create([
            'name' => 'Danh mục sản phẩm',
            'icon' => '<i class="fas fa-th-large fs-4 pe-2"></i>',
            'url' => route('product_category.index'),
            'parent_id' => $product->id,
        ]);
        Menu::create([
            'name' => 'Quản lý sản phẩm',
            'icon' => '<i class="fas fa-cube fs-4 pe-2"></i>',
            'url' => route('product.index'),
            'parent_id' => $product->id,
        ]);
        Menu::create([
            'name' => 'Danh mục topping',
            'icon' => '<i class="fas fa-th fs-4 pe-2"></i>',
            'url' => route('topping_category.index'),
            'parent_id' => $product->id,
        ]);
        Menu::create([
            'name' => 'Quản lý topping',
            'icon' => '<i class="fab fa-cuttlefish fs-4 pe-2"></i>',
            'url' => route('topping.index'),
            'parent_id' => $product->id,
        ]);

        // promotion
        $promotion = Menu::create([
            'name' => 'Khuyến mãi',
            'icon' => '<i class="fas fa-gifts fs-4 pe-2"></i>',
            'url' => route('promotion.index'),
        ]);
        Menu::create([
            'name' => 'Quản lý khuyến mãi',
            'icon' => '<i class="fas fa-gift fs-4 pe-2"></i>',
            'url' => route('promotion.index'),
            'parent_id' => $promotion->id,
        ]);
        Menu::create([
            'name' => 'Phiếu mua hàng',
            'icon' => '<i class="fas fa-percentage fs-4 pe-2"></i>',
            'url' => route('coupon.index'),
            'parent_id' => $promotion->id,
        ]);
        Menu::create([
            'name' => 'Nhóm khách hàng',
            'icon' => '<i class="fas fa-portrait fs-4 pe-2"></i>',
            'url' => route('customer_group.index'),
            'parent_id' => $promotion->id,
        ]);
        Menu::create([
            'name' => 'Quản lý khách hàng',
            'icon' => '<i class="fas fa-user-circle fs-4 pe-2"></i>',
            'url' => route('customer.index'),
            'parent_id' => $promotion->id,
        ]);

        // warehouse
        $warehouse = Menu::create([
            'name' => 'Kho hàng',
            'icon' => '<i class="fas fa-warehouse fs-4 pe-2"></i>',
            'url' => route('warehouse.index'),
        ]);
        Menu::create([
            'name' => 'Kho hàng',
            'icon' => '<i class="fas fa-warehouse fs-4 pe-2"></i>',
            'url' => route('warehouse.index'),
            'parent_id' => $warehouse->id,
        ]);
        Menu::create([
            'name' => 'Nhập hàng',
            'icon' => '<i class="fas fa-file-download fs-4 pe-2"></i>',
            'url' => route('import.index'),
            'parent_id' => $warehouse->id,
        ]);
        Menu::create([
            'name' => 'Xuất hàng',
            'icon' => '<i class="fas fa-upload fs-4 pe-2"></i>',
            'url' => route('export.index'),
            'parent_id' => $warehouse->id,
        ]);
        Menu::create([
            'name' => 'Nguyên vật liệu',
            'icon' => '<i class="fas fa-th-list fs-4 pe-2"></i>',
            'url' => route('material.index'),
            'parent_id' => $warehouse->id,
        ]);
        Menu::create([
            'name' => 'Nhà cung cấp',
            'icon' => '<i class="fas fa-people-arrows fs-4 pe-2"></i>',
            'url' => route('supplier.index'),
            'parent_id' => $warehouse->id,
        ]);
        Menu::create([
            'name' => 'Quản lý đơn vị',
            'icon' => '<i class="fab fa-untappd fs-4 pe-2"></i>',
            'url' => route('unit.index'),
            'parent_id' => $warehouse->id,
        ]);

        // report
        $report = Menu::create([
            'name' => 'Báo cáo',
            'icon' => '<i class="fas fa-chart-pie fs-4 pe-2"></i>',
            'url' => route('order.index'),
        ]);
        Menu::create([
            'name' => 'Lịch sử đơn hàng',
            'icon' => '<i class="far fa-file-alt fs-4 pe-2"></i>',
            'url' => route('order.index'),
            'parent_id' => $report->id,
        ]);
        Menu::create([
            'name' => 'Báo cáo tổng hợp',
            'icon' => '<i class="fas fa-chart-line fs-4 pe-2"></i>',
            'url' => route('report.index'),
            'parent_id' => $report->id,
        ]);

        // other
        $other = Menu::create([
            'name' => 'Khác',
            'icon' => '<i class="fas fa-cog fs-4 pe-2"></i>',
            'url' => route('setting.index'),
        ]);
        Menu::create([
            'name' => 'Cài đặt',
            'icon' => '<i class="fas fa-cog fs-4 pe-2"></i>',
            'url' => route('setting.index'),
            'parent_id' => $other->id,
        ]);
        Menu::create([
            'name' => 'Nhật ký',
            'icon' => '<i class="fas fa-history fs-4 pe-2"></i>',
            'url' => route('staff_history.index'),
            'parent_id' => $other->id,
        ]);
    }
}
