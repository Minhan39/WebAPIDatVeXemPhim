<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'category_list',
        'video',
        'description',
        'studio',
        'director',
        'actor_list',
        'language_list',
        'price'
    ];
}
