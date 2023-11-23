<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'number_tickets',
        'seat',
        'cinema_id',
        'openning_day',
        'show_time',
        'vat',
        'combo_id',
        'number_combos'
    ];
}
