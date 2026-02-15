<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'video_url',
        'video_public_id',
        'button_text',
        'button_url',
        'is_active',
    ];
}