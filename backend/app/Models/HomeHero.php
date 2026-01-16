<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeHero extends Model
{
    protected $table = 'home_heroes';

    protected $fillable = [
        'title',
        'subtitle',
        'hero_image',
        'button_text',
        'button_link',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}