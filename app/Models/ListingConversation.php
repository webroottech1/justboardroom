<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingConversation extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'listing_conversations';

    protected $fillable = [
        'created_by',
        'receiver',
        'timestamp',
        'listing_id',
        'read_check',
        'archived',
    ];

    // public $timestamps = false;

    
    /**
     * Get the listing  associated with the conversation.
    */
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

     /**
     * Get the msg for the conversation.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
