<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'room_id',
        'amount',
    ];
}
