<?php

namespace App\Http\Controllers;

use App\Models\CropProductionData;
use Illuminate\Http\Request;

class CropProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($perPage = 10)  // Default value of 10 if not provided
    {
        return CropProductionData::paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $fields = $request->validate([
            'State_Name' => 'required|string|max:22',
            'District_Name' => 'required|string|max:26',
            'Crop_Year' => 'required|integer',
            'Season' => 'required|string|max:11',
            'Crop' => 'required|string|max:25',
            'Area' => 'required|numeric',
            'Production' => 'required|string|max:10',
        ]);

     

        // Create the crop production data and associate it with the authenticated user
        $cropData = $request->user()->cropProductionData()->create($fields);

        return ['message' => 'Data added successfully', 'data' => $cropData];
    }

    /**
     * Display the specified resource.
     */
    public function show(CropProductionData $cropProductionData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CropProductionData $cropProductionData)
    {
        //
        $fields = $request->validate([
            'State_Name' => 'required|string|max:22',
            'District_Name' => 'required|string|max:26',
            'Crop_Year' => 'required|integer',
            'Season' => 'required|string|max:11',
            'Crop' => 'required|string|max:25',
            'Area' => 'required|numeric',
            'Production' => 'required|string|max:10',
        ]);

        // Create the crop production data and associate it with the authenticated user
        $cropData = $request->user()->cropProductionData()->update($fields);

        return ['message' => 'Data updated successfully', 'data' => $cropData];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CropProductionData $cropProductionData)
    {
        //
        $cropProductionData->delete();

        return ['message' => 'Data deleted successfully'];
    }
}
