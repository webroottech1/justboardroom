<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Addresses;
use App\Models\ListingAmenity;

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

    public function amenities()
    {
        return $this->belongsToMany(ListingAmenity::class,'listing_amenities', 'listing_id', 'amenity_id');
    }

    public function pictures()
    {
        return $this->hasMany(ListingGallery::class);
    }

    public function calender()
    {
        return $this->hasOne(ListingCalendar::class);
    }

    public function rules()
    {
        return $this->belongsToMany(HostingRule::class);
    }

    public function capacity()
    {
        return $this->belongsTo(ListingCapacity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
