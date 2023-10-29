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
            'icon' => '<i class="fas fa-tachometer-alt"></i>',
            'url' => route('index'),
        ]);

        // store
        $store = Menu::create([
            'name' => 'Cửa hàng',
            'icon' => '<i class="fas fa-store"></i>',
            'url' => route('store.index'),
        ]);
        Menu::create([
            'name' => 'Danh sách cửa hàng',
            'icon' => '<i class="fas fa-store"></i>',
            'url' => route('store.index'),
            'parent_id' => $store->id,
        ]);
        Menu::create([
            'name' => 'Danh sách nhân viên',
            'icon' => '<i class="fas fa-user-friends"></i>',
            'url' => route('staff.index'),
            'parent_id' => $store->id,
        ]);
        Menu::create([
            'name' => 'Danh sách quyền',
            'icon' => '<i class="fas fa-pencil-ruler"></i>',
            'url' => route('role.index'),
            'parent_id' => $store->id,
        ]);
        Menu::create([
            'name' => 'Danh sách phòng ban',
            'icon' => '<i class="fas fa-layer-group"></i>',
            'url' => route('department.index'),
            'parent_id' => $store->id,
        ]);
        Menu::create([
            'name' => 'Ca làm việc',
            'icon' => '<i class="fas fa-calendar-alt"></i>',
            'url' => route('shift.index'),
            'parent_id' => $store->id,
        ]);
        Menu::create([
            'name' => 'Khu vực bàn',
            'icon' => '<i class="far fa-clone"></i>',
            'url' => route('area.index'),
            'parent_id' => $store->id,
        ]);
        Menu::create([
            'name' => 'Danh sách bàn',
            'icon' => '<i class="fas fa-table"></i>',
            'url' => route('table.index'),
            'parent_id' => $store->id,
        ]);

        // product
        $product = Menu::create([
            'name' => 'Sản phẩm',
            'icon' => '<i class="fas fa-cubes"></i>',
            'url' => route('product.index'),
        ]);
        Menu::create([
            'name' => 'Danh mục sản phẩm',
            'icon' => '<i class="fas fa-th-large"></i>',
            'url' => route('product_category.index'),
            'parent_id' => $product->id,
        ]);
        Menu::create([
            'name' => 'Danh sách sản phẩm',
            'icon' => '<i class="fas fa-cube"></i>',
            'url' => route('product.index'),
            'parent_id' => $product->id,
        ]);
        Menu::create([
            'name' => 'Danh mục topping',
            'icon' => '<i class="fas fa-th"></i>',
            'url' => route('topping_category.index'),
            'parent_id' => $product->id,
        ]);
        Menu::create([
            'name' => 'Danh sách topping',
            'icon' => '<i class="fab fa-cuttlefish"></i>',
            'url' => route('topping.index'),
            'parent_id' => $product->id,
        ]);

        // promotion
        $promotion = Menu::create([
            'name' => 'Khuyến mãi',
            'icon' => '<i class="fas fa-gifts"></i>',
            'url' => route('promotion.index'),
        ]);
        Menu::create([
            'name' => 'Chương trình khuyến mãi',
            'icon' => '<i class="fas fa-gift"></i>',
            'url' => route('promotion.index'),
            'parent_id' => $promotion->id,
        ]);
        Menu::create([
            'name' => 'Phiếu mua hàng',
            'icon' => '<i class="fas fa-percentage"></i>',
            'url' => route('coupon.index'),
            'parent_id' => $promotion->id,
        ]);
        Menu::create([
            'name' => 'Danh mục khách hàng',
            'icon' => '<i class="fas fa-portrait"></i>',
            'url' => route('customer_group.index'),
            'parent_id' => $promotion->id,
        ]);
        Menu::create([
            'name' => 'Danh sách khách hàng',
            'icon' => '<i class="fas fa-user-circle"></i>',
            'url' => route('customer.index'),
            'parent_id' => $promotion->id,
        ]);

        // warehouse
        $warehouse = Menu::create([
            'name' => 'Kho hàng',
            'icon' => '<i class="fas fa-warehouse"></i>',
            'url' => route('warehouse.index'),
        ]);
        Menu::create([
            'name' => 'Kho hàng',
            'icon' => '<i class="fas fa-warehouse"></i>',
            'url' => route('warehouse.index'),
            'parent_id' => $warehouse->id,
        ]);
        Menu::create([
            'name' => 'Nhập hàng',
            'icon' => '<i class="fas fa-file-download"></i>',
            'url' => route('import.index'),
            'parent_id' => $warehouse->id,
        ]);
        Menu::create([
            'name' => 'Xuất hàng',
            'icon' => '<i class="fas fa-upload"></i>',
            'url' => route('export.index'),
            'parent_id' => $warehouse->id,
        ]);
        Menu::create([
            'name' => 'Nguyên vật liệu',
            'icon' => '<i class="fas fa-th-list"></i>',
            'url' => route('material.index'),
            'parent_id' => $warehouse->id,
        ]);
        Menu::create([
            'name' => 'Nhà cung cấp',
            'icon' => '<i class="fas fa-people-arrows"></i>',
            'url' => route('supplier.index'),
            'parent_id' => $warehouse->id,
        ]);
        Menu::create([
            'name' => 'Danh sách đơn vị',
            'icon' => '<i class="fab fa-untappd"></i>',
            'url' => route('unit.index'),
            'parent_id' => $warehouse->id,
        ]);

        // report
        $report = Menu::create([
            'name' => 'Báo cáo',
            'icon' => '<i class="fas fa-chart-pie"></i>',
            'url' => route('order.index'),
        ]);
        Menu::create([
            'name' => 'Lịch sử đơn hàng',
            'icon' => '<i class="far fa-file-alt"></i>',
            'url' => route('order.index'),
            'parent_id' => $report->id,
        ]);
        Menu::create([
            'name' => 'Báo cáo tổng hợp',
            'icon' => '<i class="fas fa-chart-line"></i>',
            'url' => route('report.index'),
            'parent_id' => $report->id,
        ]);

        // other
        $other = Menu::create([
            'name' => 'Khác',
            'icon' => '<i class="fas fa-cog"></i>',
            'url' => route('setting.index'),
        ]);
        Menu::create([
            'name' => 'Cài đặt',
            'icon' => '<i class="fas fa-cog"></i>',
            'url' => route('setting.index'),
            'parent_id' => $other->id,
        ]);
        Menu::create([
            'name' => 'Nhật ký',
            'icon' => '<i class="fas fa-history"></i>',
            'url' => route('staff_history.index'),
            'parent_id' => $other->id,
        ]);
    }
}
