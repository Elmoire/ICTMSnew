<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $primaryKey = 'OfficeID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'offices';

    protected $fillable = [
        'OfficeID',
        'OfficeName',
        'OfficeLocation',
    ];
}
