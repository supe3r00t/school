<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\GenderTableSeeder;
use Database\Seeders\SpecializationsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BloodTableSeeder::class,
            NationalitiesTableSeeder::class,
            religionTableSeeder::class,
            SpecializationsTableSeeder::class,
            GenderTableSeeder::class,

        ]);
    }
}

