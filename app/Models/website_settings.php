<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class website_settings extends Model
{
    use HasFactory;
    protected $table= 'website_settings';
    protected $fillable = [
        'id',
        'slogan',
        'image_path',
        'about_us_part1',
        'about_us_part2',
        'patient_number',
        'surgeries_number',
        'visitors_number',
        'address',
        'map_url',
        'image_path_map',
        'phone',
        'mobile',
        'email',
        'content_footer',
        'terms_of_use',
        'privacy_policy',
        'whatsapp',
        'facebook',
        'linkedin',
        'instagram',
        'tiktok',
        'created_at',
        'updated_at'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
}
