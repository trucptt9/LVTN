<?php

namespace App\Listeners;

use App\Events\GenerateDataStore;
use App\Models\Area;
use App\Models\CategoryProduct;
use App\Models\MethodPayment;
use App\Models\PortPayment;
use App\Models\Product;
use App\Models\SaleChanel;
use App\Models\SaleSource;
use App\Models\Settings;
use App\Models\Table;
use App\Models\TableType;
use App\Models\ToppingGroup;
use App\Models\Toppings;
use App\Models\Warehouse;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
            // area
            $area = Area::create([
                'store_id' => $store_id,
                'name' => 'Mặc định',
            ]);
            // type
            $type = TableType::create([
                'store_id' => $store_id,
                'name' => 'Mặc định',
            ]);
            // tables
            for ($i = 0; $i < 5; $i++) {
                Table::create([
                    'area_id' => $area->id,
                    'type_id' => $type->id,
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
                    'cost' => 5000
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
                'default' => true,
            ]);
            $method_payment = MethodPayment::create([
                'store_id' => $store_id,
                'name' => 'Chuyển khoản',
            ]);
            // port payment
            PortPayment::create([
                'method_id' => $method_payment->id,
                'name' => 'Momo',
                'default' => true
            ]);
            PortPayment::create([
                'method_id' => $method_payment->id,
                'name' => 'VNPay'
            ]);
            // sale source
            SaleSource::create([
                'store_id' => $store_id,
                'name' => 'Tại quầy',
                'default' => true,
            ]);
            SaleSource::create([
                'store_id' => $store_id,
                'name' => 'Mang đi',
            ]);
            $sale_source = SaleSource::create([
                'store_id' => $store_id,
                'name' => 'Giao hàng',
            ]);
            // sale channel
            SaleChanel::create([
                'source_id' => $sale_source->id,
                'name' => 'Grab',
                'default' => true
            ]);
            SaleChanel::create([
                'source_id' => $sale_source->id,
                'name' => 'Now',
            ]);
            // warehouse
            Warehouse::create([
                'store_id' => $store_id,
                'name' => 'Mặc định',
                'address' => $faker->address()
            ]);
            // settings
            //======== notify
            Settings::create([
                'store_id' => $store_id,
                'group_id' => 1,
                'code' => 'get-notify-by-email',
                'name' => 'Nhận thông báo qua email',
                'value' => 0,
                'type' => Settings::TYPE_RADIO,
            ]);
            Settings::create([
                'store_id' => $store_id,
                'group_id' => 1,
                'code' => 'list-email-get-notify',
                'name' => 'Danh sách email nhận thông báo',
                'description' => 'Mỗi email cách nhau bởi dấu ;',
            ]);
            Settings::create([
                'store_id' => $store_id,
                'group_id' => 1,
                'code' => 'get-notify-by-telegram',
                'name' => 'Nhận thông báo qua telegram',
                'value' => 0,
                'type' => Settings::TYPE_RADIO,
            ]);
            Settings::create([
                'store_id' => $store_id,
                'group_id' => 1,
                'code' => 'telegram-id-channel',
                'name' => 'ID channel telegram nhận thông báo',
            ]);
            //======== order
            Settings::create([
                'store_id' => $store_id,
                'group_id' => 1,
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
                'value' => 0,
                'type' => Settings::TYPE_RADIO,
            ]);
        } catch (\Throwable $th) {
            showLog($th);
        }
    }
}
