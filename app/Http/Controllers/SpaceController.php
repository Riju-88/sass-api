<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($perPage = 10)
    {
        //
        return Space::paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //'title',
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

    
        // Create the space data and associate it with the authenticated user
        $spaceData = $request->user()->space()->create($fields);

        return ['message' => 'Data added successfully', 'data' => $spaceData];
    }

    /**
     * Display the specified resource.
     */
    public function show(Space $space)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Space $space)
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

        $request->user()->space()->update($fields);

        return ['message' => 'Data updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Space $space)
    {
        //
        $space->delete();

        return ['message' => 'Data deleted successfully'];
    }
}
