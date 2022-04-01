<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_details';
    protected $fillable = [
        'id',
        'user_id',
        'firstname',
        'lastname',
        'profile_pic',
        'address',
        'city',
        'country',
        'province',
        'postal_code',
        'company',
        'uid',
        'tax_id',
        'terms',
        'passwordCMS',
        'token',
        'username',
        'passwordApp',
        'usernameReview',
        'active',
        'user_type',
        'microsoft_token',
        'device_token',
        'terms_guest',
        'cus_id_str',
      
    ];

   
    public function user(){

        
        return $this->belongsTo(User::class);
    }

}
