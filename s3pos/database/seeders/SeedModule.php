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
            'icon' => '<i class="fas fa-user-friends"></i>', 
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
                [
                    'code' => 'permission',
                    'name' => 'Phân quyền'
                ],
            ])

        ]);
        Module::create([
            'code' => 'department',
            'name' => 'Phòng ban',
            'icon' => '<i class="fas fa-layer-group"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'sale',
            'name' => 'Bán hàng',
            'icon' => '<i class="fas fa-layer-group"></i>',
            'actions' => json_encode([
                [
                    'code' => 'sale',
                    'name' => 'Bán hàng'
                ]
            ])
        ]);
        Module::create([
            'code' => 'position',
            'name' => 'Chức vụ',
            'icon' => '<i class="fas fa-pencil-ruler"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'shift',
            'name' => 'Ca làm việc',
            'icon' => '<i class="fas fa-calendar-alt"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'area',
            'name' => 'Khu vực bàn',
            'icon' => '<i class="far fa-clone"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'table',
            'name' => 'Bàn',
            'icon' => '<i class="fas fa-table"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'method_payment',
            'name' => 'Phương thức thanh toán',
            'icon' => '<i class="fas fa-table"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'sale_source',
            'name' => 'Kênh thanh toán',
            'icon' => '<i class="fas fa-table"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        // product
        Module::create([
            'code' => 'product_category',
            'name' => 'Danh mục sản phẩm',
            'icon' => '<i class="fas fa-th-large"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'product',
            'name' => 'Sản phẩm',
            'icon' => '<i class="fas fa-cube"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'topping_category',
            'name' => 'Danh mục topping',
            'icon' => '<i class="fas fa-th"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'topping',
            'name' => 'Topping',
            'icon' => '<i class="fab fa-cuttlefish"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);

        // promotion
        Module::create([
            'code' => 'promotion',
            'name' => 'Chương trình khuyến mãi',
            'icon' => '<i class="fas fa-gift"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'coupon',
            'name' => 'Phiếu mua hàng',
            'icon' => '<i class="fas fa-percentage"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'customer_group',
            'name' => 'Danh mục khách hàng',
            'icon' => '<i class="fas fa-portrait"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'customer',
            'name' => 'Danh sách khách hàng',
            'icon' => '<i class="fas fa-user-circle"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'card_member',
            'name' => 'Thẻ thành viên',
            'icon' => '<i class="far fa-address-card"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
            
        ]);
        Module::create([
            'code' => 'booking',
            'name' => 'Quản lý đặt lịch',
            'icon' => '<i class="fas fa-calendar-alt"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);

        // warehouse
        Module::create([
            'code' => 'warehouse',
            'name' => 'Kho hàng',
            'icon' => '<i class="fas fa-warehouse"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'import',
            'name' => 'Nhập hàng',
            'icon' => '<i class="fas fa-file-download"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'export',
            'name' => 'Xuất hàng',
            'icon' => '<i class="fas fa-upload"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'material',
            'name' => 'Nguyên vật liệu',
            'icon' => '<i class="fas fa-th-list"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'supplier',
            'name' => 'Nhà cung cấp',
            'icon' => '<i class="fas fa-people-arrows"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'unit',
            'name' => 'Đơn vị',
            'icon' => '<i class="fab fa-untappd"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);

        // report
        Module::create([
            'code' => 'order',
            'name' => 'Đơn hàng',
            'icon' => '<i class="far fa-file-alt"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'create',
                    'name' => 'Tạo mới'
                ],
                [
                    'code' => 'delete',
                    'name' => 'Xóa'
                ],
            ])
        ]);
        Module::create([
            'code' => 'report',
            'name' => 'Báo cáo',
            'icon' => '<i class="fas fa-chart-pie fs-4 pe-2"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
               
            ])
        ]);

        // other
        Module::create([
            'code' => 'setting',
            'name' => 'Cài đặt',
            'icon' => '<i class="fas fa-cog fs-4 pe-2"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
                [
                    'code' => 'update',
                    'name' => 'Cập nhật'
                ],
               
            ])
        ]);
        Module::create([
            'code' => 'staff_history',
            'name' => 'Nhật ký',
            'icon' => '<i class="fas fa-history"></i>',
            'actions' => json_encode([
                [
                    'code' => 'view',
                    'name' => 'Xem'
                ],
               
            ])
        ]);
    }
}