<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $table = "user_details";
    protected $fillable = [
        'name',
        'phone',
        'email',
        'street_address',
        'city',
        'state',
        'country',
        'profile_img'
    ];
}