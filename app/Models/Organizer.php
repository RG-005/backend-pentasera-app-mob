<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class organizer extends Model
{
    protected $fillable = [
        'organizer_name',
        'deskripsi',
        'contact_email',
        'contact_phone',
        'address'
    ];
}
