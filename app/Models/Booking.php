<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'token_option_id',
        'payment_reference',
        'notes',
        'status',
        'price_locked',
        'access_level',
    ];

    public function tokenOption()
    {
        return $this->belongsTo(TokenOption::class);
    }
}
