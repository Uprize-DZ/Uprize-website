<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = [
        'service_id',
        'name',
        'email',
        'phone',
        'preferred_date',
        'message',
        'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Services::class, 'service_id');
    }
}
