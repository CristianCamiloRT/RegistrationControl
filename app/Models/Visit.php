<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'entry_date',
        'exit_date',
        'interior',
        'house',
        'name',
        'document',
        'authorized_by',
        'observations',
        'user_id',
    ];

    public function setNameProperty($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }
}
