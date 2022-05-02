<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages';
    protected $fillable = [
        'message',
    ];

    // public $timestamps = false;


    /**
     * Get the post that owns the comment.
     */
    public function listing_conversation()
    {
        return $this->belongsTo(ListingConversation::class);
    }
}
