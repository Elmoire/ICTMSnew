<?php

namespace Database\Seeders;

use App\Models\AAuthority;
use App\Models\SOAuthority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SOAuthoritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 2; $i++) {
            $this->createSOAuthority();
        }
    }

    private function createSOAuthority(): void
    {
        $SOAuthorityFactory = SOAuthority::factory();
        $SOAuthority = $SOAuthorityFactory->make();

        if (!SOAuthority::query()->where('SOID', $SOAuthority->SOID)->exists()) {
            $SOAuthority->save();
        } else {
            echo "<script>alert('Duplicate ID found for SOAuthority');</script>";
        }
    }
}
