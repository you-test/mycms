<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationList extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'num',
        'room',
        'name',
        'address',
        'mail',
        'pay'
    ];
}
