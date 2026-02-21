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
    ];
}
