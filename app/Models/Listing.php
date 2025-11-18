<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'address',
        'price',
        'lease_type',
        'property_type',
        'gender_preference',
        'ensuite_washroom',
        'pet_friendly',
        'bathrooms',
        'photos',
    ];

    protected $casts = [
        'photos' => 'array',
        'ensuite_washroom' => 'boolean',
        'pet_friendly' => 'boolean',
    ];

    /**
     * Relationships for favorites
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
