<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $perPage = 10)
    {
        // Retrieve the authenticated user (provided by Sanctum)
        $user = auth('sanctum')->user();

        // Check if the user has the "api-requests" feature
        if (!$user->hasFeature('api-requests')) {
            return response()->json([
                'error' => 'You must subscribe to a plan to access this resource.'
            ], 403);
        }

        // Check and consume plan resources (assuming you track a "usage limit")
        if (!$user->canConsume('api-requests', 1.0)) {
            return response()->json([
                'error' => 'Plan usage limit exceeded. Please upgrade your plan.'
            ], 403);
        }

        // Consume the resource
        $user->consume('api-requests', 1.0);

        // Proceed with fetching the resources

        return Food::paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
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
        // 'is_bot',
        // 'is_megathread',
        // 'body',
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
            'is_bot' => 'required|boolean',
            'is_megathread' => 'required|boolean',
            'body' => 'required|string',
        ]);

        // Create the food data and associate it with the authenticated user
        $foodData = $request->user()->food()->create($fields);

        return ['message' => 'Data created successfully', 'data' => $foodData];
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
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
            'is_bot' => 'required|boolean',
            'is_megathread' => 'required|boolean',
            'body' => 'required|string',
        ]);

        $request->user()->food()->update($fields);

        return ['message' => 'Data updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        //
        $food->delete();

        return ['message' => 'Data deleted successfully'];
    }
}
