<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';
    use HasFactory;

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
        'cta_text',
        'cta_url',
    ];
}
