<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SOAuthority extends Model
{
    use HasFactory;

    protected $primaryKey = 'SOID';
    protected $table = 'SOAuthority';

    protected $fillable = [
        'SOID',
        'SOName',
        'SOPosition',
    ];
}
