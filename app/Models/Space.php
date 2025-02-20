<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $table = 'space';

    protected $fillable = [
        'title',
        'score',
        'upvote_ratio',
        'num_comments',
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

    protected $casts = [
        'score' => 'integer',
        'upvote_ratio' => 'decimal:2',
        'num_comments' => 'integer',
        'subscribers' => 'integer',
        'num_awards' => 'integer',
        'num_crossposts' => 'integer',
    ];
}
