<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;
use App\Http\Requests\SupplierRequest;
use App\Models\Stock;
use App\Models\Supplier;
use LDAP\Result;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::all();
        return response()->json([
            'status' => true,
            'data' => $stocks,
            'message' => 'List of Stocks'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(StockRequest $request)
    {
        $user = auth()->user();
        if ($user->id == $request->get("user_id")) {
            $stock = Stock::create($request->all());
            return response()->json([
                'status' => true,
                'data' => $stock,
                'message' => 'stock Created Successfully'
            ]);
        } else {
            $stock = Stock::create($request->all());
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
        $stock = Stock::find($id);
        if ($stock) {
            return response()->json([
                'status' => true,
                'data' => $stock,
                'message' => 'Stock Information'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'Stock not found'
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StockRequest $request, string $id)
    {
        $stock = Stock::find($id);
        $stock = $stock->update($request->all());
        return response()->json([
            'status' => true,
            'data' => $stock,
            'message' => 'Stock Update Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Stock::destroy($id);
        if ($result) {
            return response()->json([
                'status' => true,
                'data' => null,
                'message' => 'Stock Deleted Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'Stock not found'
            ]);
        }
    }
}
