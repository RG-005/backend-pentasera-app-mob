<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $fillable = [
        'order_id',
        'ticket_id',
        'jumlah',
        'subtotal'
    ];
}
