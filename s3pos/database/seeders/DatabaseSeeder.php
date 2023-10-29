<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SeedBusinessType::class);
        $this->call(SeedMenu::class);
        $this->call(SeedModule::class);
        $this->call(SeedBrand::class);
    }
}
