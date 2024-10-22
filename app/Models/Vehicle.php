<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'entry_date',
        'exit_date',
        'interior',
        'house',
        'plate',
        'brand',
        'left_state',
        'right_state',
        'back_state',
        'front_state',
        'observations',
        'antenna',
        'frontal',
        'spare_parts',
        'mirrors',
        'lights',
        'stops',
        'glasses'
    ];
}
