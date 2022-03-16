<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingUserDefinedAmenity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_amenity',
    ];


    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

}
