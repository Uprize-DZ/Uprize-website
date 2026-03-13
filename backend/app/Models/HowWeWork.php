<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowWeWork extends Model
{
    protected $table = 'how_we_work';
    use HasFactory;

    protected $fillable = [
        'step_number',
        'title',
        'description',
        'image',
        'order',
    ];
}
