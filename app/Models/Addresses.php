<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Listing;

class Addresses extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'listing_id',
        'formatted_address',
        'postal_code',
        'lat',
        'lng',
        'building_name',
        'address',
        'city',
        'province'
    ];

    /**
     * Get the record associated with the user.
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }


}













