<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Steam2024Bestrevenue1500 extends Model
{
    use HasFactory;

    protected $table = 'steam_2024_bestrevenue_1500';

    protected $fillable = [
        'name',
        'releaseDate',
        'copiesSold',
        'price',
        'revenue',
        'avgPlaytime',
        'reviewScore',
        'publisherClass',
        'publishers',
        'developers',
        'steamId',
        'user_id',
    ];

    // Define the attributes with the correct data types
    protected $casts = [
        'price' => 'decimal:2',
        'copiesSold' => 'integer',
        'reviewScore' => 'integer',
        'steamId' => 'integer',
    ];

    // Define the relationship with the User model (assuming each game entry belongs to a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
