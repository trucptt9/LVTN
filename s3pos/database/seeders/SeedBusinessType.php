<?php

namespace Database\Seeders;

use App\Models\BusinessType;
use App\Models\StoreType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedBusinessType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('business_types')->delete();
        DB::table('store_types')->delete();

        BusinessType::create([
            'id' => 1,
            'name' => 'Coffee'
        ]);
        BusinessType::create([
            'id' => 2,
            'name' => 'Nhà hàng'
        ]);

        StoreType::create([
            'id' => 1,
            'code' => 'MALL',
            'name' => 'Mô hình trong siêu thị'
        ]);
        StoreType::create([
            'id' => 2,
            'code' => 'STORE',
            'name' => 'Mô hình cửa hàng'
        ]);
        StoreType::create([
            'id' => 3,
            'code' => 'TAKE-AWAY',
            'name' => 'Mô hình xe bán mang đi'
        ]);
    }
}
