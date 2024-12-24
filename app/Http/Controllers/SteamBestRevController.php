<?php

namespace App\Http\Controllers;

use App\Models\Steam2024Bestrevenue1500;
use Illuminate\Http\Request;

class SteamBestRevController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($perPage = 10)
    {
        //
        return Steam2024Bestrevenue1500::paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 'name',
        // 'releaseDate',
        // 'copiesSold',
        // 'price',
        // 'revenue',
        // 'avgPlaytime',
        // 'reviewScore',
        // 'publisherClass',
        // 'publishers',
        // 'developers',
        // 'steamId',

        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'releaseDate' => 'required|date',
            'copiesSold' => 'required|numeric',
            'price' => 'required|numeric',
            'revenue' => 'required|numeric',
            'avgPlaytime' => 'required|numeric',
            'reviewScore' => 'required|numeric',
            'publisherClass' => 'required|string|max:255',
            'publishers' => 'required|string|max:255',
            'developers' => 'required|string|max:255',
            'steamId' => 'required|string|max:255',
        ]);

        // Create the crop production data and associate it with the authenticated user
        $steamdata = $request->user()->steam2024Bestrevenue1500()->create($fields);
        return ['message' => 'Data added successfully', 'data' => $steamdata];
    }

    /**
     * Display the specified resource.
     */
    public function show(Steam2024Bestrevenue1500 $steam2024Bestrevenue1500)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Steam2024Bestrevenue1500 $steam2024Bestrevenue1500)
    {
        //
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'releaseDate' => 'required|date',
            'copiesSold' => 'required|numeric',
            'price' => 'required|numeric',
            'revenue' => 'required|numeric',
            'avgPlaytime' => 'required|numeric',
            'reviewScore' => 'required|numeric',
            'publisherClass' => 'required|string|max:255',
            'publishers' => 'required|string|max:255',
            'developers' => 'required|string|max:255',
            'steamId' => 'required|string|max:255',
        ]);

        $request->user()->steam2024Bestrevenue1500->update($fields);

        return ['message' => 'Data updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Steam2024Bestrevenue1500 $steam2024Bestrevenue1500)
    {
        //
        $steam2024Bestrevenue1500->delete();

        return ['message' => 'Data deleted successfully'];
    }
}
