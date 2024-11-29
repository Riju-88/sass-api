<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travel';

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
    ];

    // Define the attributes with their appropriate data types
    protected $casts = [
        'score' => 'integer',
        'upvote_ratio' => 'decimal:2',
        'num_comments' => 'integer',
        'subscribers' => 'integer',
        'num_awards' => 'integer',
        'num_crossposts' => 'integer',
    ];
}
