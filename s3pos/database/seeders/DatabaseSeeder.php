<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SeedSettingGroup::class);
        $this->call(SeedBusinessType::class);
        $this->call(SeedAdmin::class);
        $this->call(SeedAdminMenu::class);
        $this->call(SeedMenu::class);
        $this->call(SeedModule::class);
        $this->call(SeedBrand::class);
        $this->call(SeedAdminSetting::class);
        Artisan::call('app:sync-bank-list');
    }
}
