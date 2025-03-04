<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_banner',
        'meeting_banner',
        'restaurant_banner',
        'reservation_banner',
        'special_offer_banner',
        'gallery_banner',
        'contact_banner',
    ];
}
