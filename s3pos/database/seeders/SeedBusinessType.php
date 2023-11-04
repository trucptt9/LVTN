<?php

namespace Database\Seeders;

use App\Models\BusinessType;
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

        BusinessType::create([
            'id' => 1,
            'name' => 'Coffee'
        ]);
        BusinessType::create([
            'id' => 2,
            'name' => 'Nhà hàng'
        ]);
    }
}
