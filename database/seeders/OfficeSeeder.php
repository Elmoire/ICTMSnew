<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Office;
use App\Helpers\IDGenerator;

class OfficeSeeder extends Seeder
{
    public function run(): void
    {
        $this->createOffice('PPD');
        $this->createOffice('ICTMS');
        $this->createOffice('SocPen');
        $this->createOffice('CashUnit');

    }

    private function createOffice(string $type): void
    {
        $offices = Office::factory()->$type()->make();
        if (!Office::query()->where('OfficeID', $offices->OfficeID)->exists()) {
            $offices->save();
        } else {
            echo "<script>alert('Duplicate ID found for Office');</script>";
        }
    }
}
