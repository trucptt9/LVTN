<?php

namespace Database\Seeders;

use App\Events\GenerateDataBrand;
use App\Models\Brand;
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
        DB::table('brands')->delete();
        DB::table('staffs')->delete();
        DB::table('positions')->delete();
        DB::table('departments')->delete();
        DB::table('roles')->delete();
        DB::table('stores')->delete();
        DB::table('stores')->delete();
        $faker = \Faker\Factory::create();

        $brand = Brand::create([
            'type_id' => 1,
            'name' => 'G-Caffee',
            'phone' => $faker->phonenumber(),
            'email' => $faker->email(),
            'address' => $faker->address(),
            'status' => true,
        ]);
        event(new GenerateDataBrand($brand));
    }
}
