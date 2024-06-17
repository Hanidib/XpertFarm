<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json([
            'status' => true,
            'data' => $suppliers,
            'message' => 'List of Suppliers'
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {
        $user = auth()->user();
        if ($user->id == $request->get("user_id")) {
            $suppliers = Supplier::create($request->all());
            return response()->json([
                'status' => true,
                'data' => $suppliers,
                'message' => 'Supplier Created Successfully'
            ]);
        } else {
            $suppliers = Supplier::create($request->all());
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'user is not Authenticated'
            ]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $suppliers = Supplier::find($id);
        if ($suppliers) {
            return response()->json([
                'status' => true,
                'data' => $suppliers,
                'message' => 'Suppliers Information'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'Supplier not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, string $id)
    {
        $user = auth()->user();
        if ($user->id == $request->get("user_id")) {
            $suppliers = Supplier::find($id);
            $suppliers = $suppliers->update($request->all());
            return response()->json([
                'status' => true,
                'data' => $suppliers,
                'message' => 'Suppliers Update Successfuly'
            ]);
        } else {
            $suppliers = Supplier::create($request->all());
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'user is not Authenticated'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Supplier::destroy($id);
        if ($result) {
            return response()->json([
                'status' => true,
                'data' => null,
                'message' => 'Suppliers Deleted Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'Suppliers not found'
            ]);
        }
    }
}
