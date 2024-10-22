<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $primaryKey = 'EmployeeID';

    protected $fillable = [
        'EmployeeID',
        'EmployeeName',
        'EmployeeEmail',
        'OfficeID'
    ];

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'OfficeID');
    }
}
