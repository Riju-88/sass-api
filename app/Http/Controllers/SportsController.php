<?php

namespace App\Http\Controllers;

use App\Models\Sports;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($perPage = 10)
    {
        //
        return Sports::paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // 'title',
        // 'score',
        // 'upvote_ratio',
        // 'num_comments',
        // 'subreddit',
        // 'subscribers',
        // 'permalink',
        // 'url',
        // 'domain',
        // 'num_awards',
        // 'num_crossposts',
        // 'crosspost_subreddits',
        // 'post_type',
        // 'is_nsfw',
        // 'is_bot',
        // 'is_megathread',
        // 'body',

        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'score' => 'required|integer',
            'upvote_ratio' => 'required|numeric',
            'num_comments' => 'required|integer',
            'subreddit' => 'required|string|max:255',
            'subscribers' => 'required|integer',
            'permalink' => 'required|string',
            'url' => 'required|string',
            'domain' => 'required|string',
            'num_awards' => 'required|integer',
            'num_crossposts' => 'required|integer',
            'crosspost_subreddits' => 'required|string',
            'post_type' => 'required|string',
            'is_nsfw' => 'required|boolean',
            'is_bot' => 'required|boolean',
            'is_megathread' => 'required|boolean',
            'body' => 'required|string',
        ]);

        // Create the sports data and associate it with the authenticated user
        $sportData = $request->user()->sports()->create($fields);

        return ['message' => 'Data added successfully', 'data' => $sportData];
    }

    /**
     * Display the specified resource.
     */
    public function show(Sports $sports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sports $sports)
    {
        //
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'score' => 'required|integer',
            'upvote_ratio' => 'required|numeric',
            'num_comments' => 'required|integer',
            'subreddit' => 'required|string|max:255',
            'subscribers' => 'required|integer',
            'permalink' => 'required|string',
            'url' => 'required|string',
            'domain' => 'required|string',
            'num_awards' => 'required|integer',
            'num_crossposts' => 'required|integer',
            'crosspost_subreddits' => 'required|string',
            'post_type' => 'required|string',
            'is_nsfw' => 'required|boolean',
            'is_bot' => 'required|boolean',
            'is_megathread' => 'required|boolean',
            'body' => 'required|string',
        ]);

        $request->user()->sports()->update($fields);

        return ['message' => 'Data updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sports $sports)
    {
        //
        $sports->delete();

        return ['message' => 'Data deleted successfully'];
    }
}
