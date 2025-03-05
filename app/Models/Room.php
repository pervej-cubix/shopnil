<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'fetcher',
        'price',
       
    ];

    protected function casts(): array
    {
        return [
            'fetcher' => 'array',
           
        ];
    }
}