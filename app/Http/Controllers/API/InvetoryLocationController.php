<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvetoryLocationRequest;
use App\Models\InvetoryLocation;
use Illuminate\Http\Request;

class InvetoryLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $InvetoryLocation = InvetoryLocation::all();
        return response()->json([
            'status' => true,
            'data' => $InvetoryLocation,
            'message' => 'List of InvetoryLocations'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(InvetoryLocationRequest $request)
    {
        $InvetoryLocation = InvetoryLocation::create($request->all());
        return response()->json([
            'status' => true,
            'data' => $InvetoryLocation,
            'message' => 'InvetoryLocation Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $InvetoryLocation = InvetoryLocation::find($id);
        if ($InvetoryLocation) {
            return response()->json([
                'status' => true,
                'data' => $InvetoryLocation,
                'message' => 'InvetoryLocation Information'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'InvetoryLocation not found'
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(InvetoryLocationRequest $request, string $id)
    {
        $InvetoryLocation = InvetoryLocation::find($id);
        $InvetoryLocation = $InvetoryLocation->update($request->all());
        return response()->json([
            'status' => true,
            'data' => $InvetoryLocation,
            'message' => 'InvetoryLocation Update Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = InvetoryLocation::destroy($id);
        if ($result) {
            return response()->json([
                'status' => true,
                'data' => null,
                'message' => 'InvetoryLocation Deleted Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'InvetoryLocation not found'
            ]);
        }
    }
}
