<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'website_name',
        'logo',
        'banner',
        'donation_qr',
        'address',
        'latitude',
        'longitude',
        'whatsapp',
        'email',
    ];
}

