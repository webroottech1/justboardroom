<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingCalender extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'listing_calenders';

    protected $fillable = [
        'startDate',
        'endDate    ',
        'days',
        'listing_id',
    ];

    /**
     * Get the user that owns the list.
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listing()
    {
    	return $this->belongsTo(Listing::class);
    }


}
