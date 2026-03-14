<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';
    use HasFactory;

    protected $casts = [
        'is_active' => 'boolean',
        'mission_is_active' => 'boolean',
        'vision_is_active' => 'boolean',
        'values_is_active' => 'boolean',
    ];

    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'mission_title',
        'mission_description',
        'vision_title',
        'vision_description',
        'values_title',
        'values_description',
        'stat1_number',
        'stat1_label',
        'stat2_number',
        'stat2_label',
        'stat3_number',
        'stat3_label',
        'stat4_number',
        'stat4_label',
        'media_type',
        'media_url',
        'media_public_id',
        'label',
        'bullet1',
        'bullet2',
        'bullet3',
        'is_active',
        'mission_is_active',
        'mission_image',
        'vision_is_active',
        'vision_image',
        'values_is_active',
        'values_image',
    ];
}
