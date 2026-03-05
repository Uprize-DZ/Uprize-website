<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolicyPage extends Model
{
    protected $table = 'policy_pages';

    protected $fillable = [
        'type',
        'title',
        'body',
    ];
}
