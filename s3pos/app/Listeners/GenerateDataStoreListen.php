<?php

namespace App\Listeners;

use App\Events\GenerateDataStore;
use App\Models\Area;
use App\Models\CategoryProduct;
use App\Models\CustomerGroup;
use App\Models\Department;
use App\Models\MethodPayment;
use App\Models\Position;
use App\Models\Product;
use App\Models\SaleSource;
use App\Models\SettingGroup;
use App\Models\Settings;
use App\Models\Staff;
use App\Models\Table;
use App\Models\ToppingGroup;
use App\Models\Toppings;
use App\Models\Warehouse;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;

class GenerateDataStoreListen
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(GenerateDataStore $event): void
    {
        try {
            $faker = \Faker\Factory::create();
            $store_id = $event->store->id;

            //position
            $position = Position::create([
                'store_id' => $store_id,
                'name' => 'Kỹ thuật'
            ]);
            // department
            $department = Department::create([
                'store_id' => $store_id,
                'name' => 'Kỹ thuật'
            ]);
            // staff 
            Staff::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'password' => Hash::make('123456'),
                'is_supper' => 'true',
                'status' => Staff::STATUS_ACTIVE,
                'address' => $faker->address(),
                'department_id' => $department->id,
                'position_id' => $position->id,
                'store_id' => $store_id,
            ]);
            // customer group
            CustomerGroup::create([
                'store_id' => $store_id,
                'name' => 'Mặc định',
                'default' => 'true',
            ]);

            // area
            $area = Area::create([
                'store_id' => $store_id,
                'name' => 'Mặc định',
            ]);
            // tables
            for ($i = 0; $i < 5; $i++) {
                Table::create([
                    'area_id' => $area->id,

                    'name' => $i,
                ]);
            }

            // product category
            $category = CategoryProduct::create([
                'store_id' => $store_id,
                'name' => 'Cà phê'
            ]);
            for ($i = 0; $i < 5; $i++) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Cà phê ' . $i,
                    'price' => 10000 + $i * 1000,
                    'cost' => 5000,

                ]);
            }
            // topping group
            $topping_group = ToppingGroup::create([
                'store_id' => $store_id,
                'name' => 'Thạch'
            ]);
            // toppings
            for ($i = 0; $i < 5; $i++) {
                Toppings::create([
                    'group_id' => $topping_group->id,
                    'name' => 'Topping ' . $i,
                    'price' => 5000,
                    'cost' => 1000
                ]);
            }
            // method payment
            MethodPayment::create([
                'store_id' => $store_id,
                'name' => 'Tiền mặt',
                'default' => 'true',
            ]);
            MethodPayment::create([
                'store_id' => $store_id,
                'name' => 'Chuyển khoản',
            ]);
            // sale source
            SaleSource::create([
                'store_id' => $store_id,
                'name' => 'Tại quầy',
                'default' => 'true',
            ]);
            SaleSource::create([
                'store_id' => $store_id,
                'name' => 'Mang đi',
            ]);
            SaleSource::create([
                'store_id' => $store_id,
                'name' => 'Giao hàng',
            ]);
            // warehouse
            Warehouse::create([
                'store_id' => $store_id,
                'name' => 'Mặc định',
                'address' => $faker->address()
            ]);
            // settings
            //======== notification
            $notification = SettingGroup::ofCode('notification')->first();
            Settings::create([
                'store_id' => $store_id,
                'group_id' => $notification->id,
                'code' => 'get-notify-by-email',
                'name' => 'Nhận thông báo qua email',
                'value' => 0,
                'type' => Settings::TYPE_RADIO,
            ]);
            Settings::create([
                'store_id' => $store_id,
                'group_id' => $notification->id,
                'code' => 'list-email-get-notify',
                'name' => 'Danh sách email nhận thông báo',
                'description' => 'Mỗi email cách nhau bởi dấu ;',
            ]);
            Settings::create([
                'store_id' => $store_id,
                'group_id' => $notification->id,
                'code' => 'get-notify-by-telegram',
                'name' => 'Nhận thông báo qua telegram',
                'value' => 0,
                'type' => Settings::TYPE_RADIO,
            ]);
            Settings::create([
                'store_id' => $store_id,
                'group_id' => $notification->id,
                'code' => 'telegram-id-channel',
                'name' => 'ID channel telegram nhận thông báo',
            ]);

            //======== order
            $order = SettingGroup::ofCode('order')->first();
            Settings::create([
                'store_id' => $store_id,
                'group_id' => $order->id,
                'code' => 'remove-order-tmp',
                'name' => 'Cho phép hủy đơn tạm',
                'value' => 0,
                'type' => Settings::TYPE_RADIO,
            ]);
            Settings::create([
                'store_id' => $store_id,
                'group_id' => 1,
                'code' => 'remove-order-finish',
                'name' => 'Cho phép hủy đơn kết thúc',
                'group_id' => $order->id,
                'type' => Settings::TYPE_RADIO,
            ]);
        } catch (\Throwable $th) {
            showLog($th);
        }
    }
}
