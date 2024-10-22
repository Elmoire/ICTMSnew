<?php

namespace Database\Seeders;

use App\Models\AAuthority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AAuthoritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 2; $i++) {
            $this->createAAuthority();
        }
    }

    private function createAAuthority(): void
    {
        $AAuthorityFactory = AAuthority::factory();
        $AAuthority = $AAuthorityFactory->make();

        if (!AAuthority::query()->where('AAID', $AAuthority->AAID)->exists()) {
            $AAuthority->save();
        } else {
            echo "<script>alert('Duplicate ID found for AAuthority');</script>";
        }
    }
}
