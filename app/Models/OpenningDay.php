<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenningDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'cinema_id', 'date'
    ];
}
