<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // ✅ Add this to allow mass assignment
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'address',
        'price',
        'lease_type',
        'property_type',
        'ensuite_washroom',
        'pet_friendly',
        'bathrooms',
        'photos',
    ];

    // (optional) Casts for JSON and booleans
    protected $casts = [
        'photos' => 'array',
        'ensuite_washroom' => 'boolean',
        'pet_friendly' => 'boolean',
    ];
}
