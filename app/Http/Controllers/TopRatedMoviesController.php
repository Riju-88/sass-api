<?php

namespace App\Http\Controllers;

use App\Models\TopRatedMovies;
use Illuminate\Http\Request;

class TopRatedMoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($perPage = 10)
    {
        //
        return TopRatedMovies::paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    'popularity',
        // 'release_date',
        // 'title',
        // 'vote_average',

        $fields = $request->validate([
            'popularity' => 'required|numeric',
            'release_date' => 'required|date',
            'title' => 'required|string|max:255',
            'vote_average' => 'required|numeric',
        ]);

        // Create the top rated movies data and associate it with the authenticated user
        $topRatedMovies = $request->user()->topRatedMovies()->create($fields);

        return ['message' => 'Data added successfully', 'data' => $topRatedMovies];
    }

    /**
     * Display the specified resource.
     */
    public function show(TopRatedMovies $topRatedMovies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TopRatedMovies $topRatedMovies)
    {
        //
        $fields = $request->validate([
            'popularity' => 'required|numeric',
            'release_date' => 'required|date',
            'title' => 'required|string|max:255',
            'vote_average' => 'required|numeric',
        ]);

        $request->user()->topRatedMovies->update($fields);

        return ['message' => 'Data updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TopRatedMovies $topRatedMovies)
    {
        //
        $topRatedMovies->delete();

        return ['message' => 'Data deleted successfully'];
    }
}
