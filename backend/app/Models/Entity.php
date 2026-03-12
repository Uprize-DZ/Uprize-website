<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $table = 'entity';
    protected $fillable = [
        'name',
        'description',
        'slogan',
        'website',
        'email',
        'phone',
        'address',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'youtube_url',
        'linkedin_url',
        'tiktok_url',
        'whatsapp_number',
    ];
}
