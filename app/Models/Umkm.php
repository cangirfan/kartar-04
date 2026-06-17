<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = 'umkms';

    protected $fillable = [
        'name',
        'owner_name',
        'description',
        'image',
        'whatsapp',
        'location',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
