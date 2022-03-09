<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Addresses;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'description',
        'name',
        'capacity',
        'per_hour_rate',
        'per_day_rate',
        'listing_capacity',
        'price_per_hour',
        'price_per_day',
        'listing_type'
    ];

     /**
     * Get the user that owns the list.
     */
    public function address()
    {
        return $this->hasOne(Addresses::class);
    }
}
