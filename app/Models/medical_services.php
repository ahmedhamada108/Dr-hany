<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medical_services extends Model
{
    use HasFactory;
    protected $table= 'medical_services';
    protected $fillable = [
        'id',
        'title',
        'description',
        'video_path',
        'created_at',
        'updated_at'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
}
