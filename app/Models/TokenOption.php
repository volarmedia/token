<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokenOption extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'access_level',
        'inventory',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
