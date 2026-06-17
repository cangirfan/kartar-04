<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $table = 'management';

    protected $fillable = [
        'name',
        'position',
        'image',
        'description',
    ];
}
