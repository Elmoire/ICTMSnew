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
        $this->call(ConferenceRoomSeeder::class);
        $this->call(VehicleSeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(AAuthoritySeeder::class);
        $this->call(SOAuthoritySeeder::class);
    }
}
