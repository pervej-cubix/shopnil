<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetails extends Model
{
    use HasFactory;

    protected $table = 'reservation_details';

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'address',
        'country',
        'email',
        'phone',
        'checkin',
        'checkout',
        'room_type',
        'room_no',
        'adult_no',
        'child_no',
        'requirements'
    ];
}
