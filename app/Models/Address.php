<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Address extends Model
{
    use HasFactory;

    // table associated with the model
    protected $table = 'addresses';

    // Fillable fields
    protected $fillable = [
        'recipient_name',
        'recipient_phone_number	',
        'province',
        'city',
        'subdistrict',
        'village',
        'postal_code',
        'home_address',
        'other_details',
        'user_id'
    ];

    // one-to-many relationship to the user table
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
