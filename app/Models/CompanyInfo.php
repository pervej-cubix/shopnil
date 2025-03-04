<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'facebook',
        'twitter',
        'youtube',
        'instagram',
        'logo',
        'footer_title',
        'map_link',
        'favicon'
    ];
}
