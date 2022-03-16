<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingCalendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'startDate',
        'endDate',
        'days',
        'listing_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listing()
    {
    	return $this->belongsTo(Listing::class);
    }
}
