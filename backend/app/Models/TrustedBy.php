<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrustedBy extends Model
{
    protected $table = 'trusted_by';

    protected $fillable = [
        'name',
        'logo_image',
        'website_url',
        'is_active',
        'order'
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
