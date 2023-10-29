<?php

namespace App\Listeners;

use App\Events\GenerateDataBrand;
use App\Models\Department;
use App\Models\Position;
use App\Models\Role;
use App\Models\Staff;
use App\Models\Store;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;

class GenerateDataBrandListen
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
    public function handle(GenerateDataBrand $event): void
    {
        try {
            $brand_id = $event->brand->id;
            $faker = \Faker\Factory::create();
            $role = Role::create([
                'brand_id' => $brand_id,
                'name' => 'Quản trị viên'
            ]);
            $position = Position::create([
                'brand_id' => $brand_id,
                'name' => 'Kỹ thuật'
            ]);
            $department = Department::create([
                'brand_id' => $brand_id,
                'name' => 'Kỹ thuật'
            ]);
            Staff::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'phone' => $faker->phonenumber(),
                'password' => Hash::make('123456'),
                'is_supper' => true,
                'status' => Staff::STATUS_ACTIVE,
                'address' => $faker->address(),
                'department_id' => $department->id,
                'position_id' => $position->id,
                'brand_id' => $brand_id,
                'role_id' => $role->id,
            ]);
            Store::create([
                'brand_id' => $brand_id,
                'type_id' => 2,
                'name' => 'Cửa hàng cafe TT',
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'status' => true,
            ]);
        } catch (\Throwable $th) {
            showLog($th);
        }
    }
}
