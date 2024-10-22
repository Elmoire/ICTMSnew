<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'driver';
    protected $primaryKey = 'DriverID';

    protected $fillable = [
        'DriverID',
        'DriverName',
        'DriverEmail',
        'ContactNo',
        'Availability',
    ];

}
