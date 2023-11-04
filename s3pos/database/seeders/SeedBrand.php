<?php

namespace Database\Seeders;

use App\Events\GenerateDataStore;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedBrand extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staffs')->delete();
        DB::table('positions')->delete();
        DB::table('departments')->delete();
        DB::table('stores')->delete();
        $faker = \Faker\Factory::create();
        // store
        $store = Store::create([
            'business_type_id' => 2,
            'name' => 'Cửa hàng cafe TT',
            'phone' => $faker->phoneNumber(),
            'address' => $faker->address(),
            'status' => true,
        ]);
        event(new GenerateDataStore($store));
    }
}
