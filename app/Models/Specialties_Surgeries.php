<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialties_Surgeries extends Model
{
    use HasFactory;
    protected $table= 'specialties_surgeries';
    protected $fillable = [
        'id',
        'title',
        'description',
        'image_path',
        'created_at',
        'updated_at'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
}
