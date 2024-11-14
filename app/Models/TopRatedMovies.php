<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopRatedMovies extends Model
{
    use HasFactory;

    protected $fillable = [
        'popularity',
        'release_date',
        'title',
        'vote_average',
        'user_id',
    ];

    protected $casts = [
        'popularity' => 'decimal:3',
        'vote_average' => 'decimal:3',
        'release_date' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
