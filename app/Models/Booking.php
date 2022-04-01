<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function listing(){

        return $this->belongsTo(Listing::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
    
}
