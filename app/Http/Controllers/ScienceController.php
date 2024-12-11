<?php

namespace App\Http\Controllers;

use App\Models\Science;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LucasDotVin\Soulbscription\Models\Subscription;

class ScienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $perPage = 10)  // Default value of 10 if not provided
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
