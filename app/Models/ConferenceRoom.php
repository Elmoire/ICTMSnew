<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceRoom extends Model
{
    use HasFactory;

    protected $primaryKey = 'CRoomID';
    protected $table = 'conference_rooms';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'CRoomID',
        'Availability',
        'CRoomName',
        'Location',
        'Capacity',
    ];
}
