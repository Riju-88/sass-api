<?php

namespace App\Http\Controllers;

use App\Models\AnnualTemperature;
use Illuminate\Http\Request;

class AnnualTemperatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($perPage = 10)  // Default value of 10 if not provided
    {
        return AnnualTemperature::paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $fields = $request->validate([
            'country' => 'required|string|max:50',
            'Year' => 'required|integer',
            'Temperature_anomaly' => 'required|numeric',
        ]);

        // Create the crop production data and associate it with the authenticated user
        $tempData = $request->user()->annualTemperature()->create($fields);

        return response()->json(['message' => 'Data added successfully', 'data' => $tempData], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AnnualTemperature $annualTemperature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnnualTemperature $annualTemperature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnnualTemperature $annualTemperature)
    {
        //
    }
}
