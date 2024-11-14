<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Science extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'science'; 

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'title',
        'score',
        'upvote_ratio',
        'num_comments',
        'created_utc',
        'subreddit',
        'subscribers',
        'permalink',
        'url',
        'domain',
        'num_awards',
        'num_crossposts',
        'crosspost_subreddits',
        'post_type',
        'is_nsfw',
        'is_bot',
        'is_megathread',
        'body',
        'user_id',
    ];

    // Define the attributes with the correct data types
    protected $casts = [
        'score' => 'integer',
        'upvote_ratio' => 'decimal:2',
        'num_comments' => 'integer',
        'subscribers' => 'integer',
        'num_awards' => 'integer',
        'num_crossposts' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
