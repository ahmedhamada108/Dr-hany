<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class awards extends Model
{
    use HasFactory;
    protected $table= 'awards';
    protected $fillable = [
        'id',
        'title',
        'image_path',
        'created_at',
        'updated_at'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
}
