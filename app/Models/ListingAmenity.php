<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Listing;

class ListingAmenity extends Model
{
    use HasFactory;

    protected $fillable =  [
        'icon',
        'listing_id',
        'description',
        'name'
    ];

    public function listings()
    {
        return $this->belongsToMany(Listing::class, 'listing_amenities', 'amenity_id', 'listing_id');
    }
}
