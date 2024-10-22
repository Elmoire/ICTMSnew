<?php

namespace App\Helpers;

class IDGenerator
{
    public function __construct() {

    }

    // generate IDs for Office, Employee, Conference Room, Conference Request, and Vehicle Request
    public function generateID_10(): string
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        $randomNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

        return $currentYear . $currentMonth . $randomNumber;
    }

    // generate IDs for Vehicle
    public function generateID_3(): string
    {
        $randomNumber = str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
        return substr($randomNumber, 0, 3);
    }

    public function generateID_8(): string
    {
        $currentYear = date('Y');
        $randomNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
        return substr($currentYear . $randomNumber, 0, 8);
    }
}
