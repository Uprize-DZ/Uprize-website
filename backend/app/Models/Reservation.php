<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'first_name',
        'second_name',
        'phone',
        'email',
        'service',
        'services_details',
    ];
}
