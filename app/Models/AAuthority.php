<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AAuthority extends Model
{
    use HasFactory;

    protected $primaryKey = 'AAID';
    protected $table = 'AAuthority';

    protected $fillable = [
        'AAID',
        'AAName',
        'AAPosition',
    ];
}
