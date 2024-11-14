<?php

namespace App\Http\Controllers;

use App\Models\Science;
use Illuminate\Http\Request;

class ScienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($perPage = 10)  // Default value of 10 if not provided
    {
        return Science::paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'score' => 'required|integer',
            'upvote_ratio' => 'required|numeric',
            'num_comments' => 'required|integer',
            'created_utc' => 'required|integer',
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

        // Create the crop production data and associate it with the authenticated user
        $scienceData = $request->user()->science()->create($fields);

        return ['message' => 'Data added successfully', 'data' => $scienceData];
    }

    /**
     * Display the specified resource.
     */
    public function show(Science $science)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Science $science)
    {
        //
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'score' => 'required|integer',
            'upvote_ratio  ' => 'required|numeric',
            'num_comments' => 'required|integer',
            'created_utc' => 'required|integer',
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

        $request->user()->science()->update($fields);

        return ['message' => 'Data updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Science $science)
    {
        //
        $science->delete();

        return ['message' => 'Data deleted successfully'];
    }
}
