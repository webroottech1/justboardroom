<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingCapacity extends Model
{
    use HasFactory;

    public function listing()
    {
        return $this->hasOne(Listing::class);
    }

}
