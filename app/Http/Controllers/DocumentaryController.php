<?php

namespace App\Http\Controllers;

use App\Models\Documentary;
use Illuminate\Http\Request;

class DocumentaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($perPage = 10)
    {
       
        return Documentary::paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate these:
        // 'title',
        // 'score',
        // 'upvote_ratio',
        // 'num_comments',
        // 'created_utc',
        // 'subreddit',
        // 'subscribers',
        // 'permalink',
        // 'url',
        // 'domain',
        // 'num_awards',
        // 'num_crossposts',
        // 'crosspost_subreddits',
        // 'post_type',
        // 'is_bot',
        // 'is_megathread',
        // 'user_id',

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
        ]);

        // Create the documentary data and associate it with the authenticated user
        $documentaryData = $request->user()->documentary()->create($fields);

        return ['message' => 'Data added successfully', 'data' => $documentaryData];
    }

    /**
     * Display the specified resource.
     */
    public function show(Documentary $documentary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documentary $documentary)
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
        ]);

        $request->user()->documentary()->update($fields);

        return ['message' => 'Data updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documentary $documentary)
    {
        //
        $documentary->delete();

        return ['message' => 'Data deleted successfully'];
    }
}
