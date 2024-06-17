<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PurchaseOrderRequest;

use App\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $PurchaseOrder = PurchaseOrder::all();
        return response()->json([
            'status' => true,
            'data' => $PurchaseOrder,
            'message' => 'list of Purchase Order'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchaseOrderRequest $request)
    {
        $PurchaseOrder = PurchaseOrder::create($request->all());
        return response()->json([
            'status' => true,
            'data' => $PurchaseOrder,
            'message' => 'Purchase Order Created Successfully'

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $PurchaseOrder = PurchaseOrder::find($id);
        if ($PurchaseOrder) {
            return response()->json([
                'status' => true,
                'data' => $PurchaseOrder,
                'message' => 'Purchase Order Information'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'Purchase Order not found'
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $PurchaseOrder = PurchaseOrder::find($id);
        $PurchaseOrder = $PurchaseOrder->update($request->all());
        return response()->json([
            'status' => true,
            'data' => $PurchaseOrder,
            'message' => 'Purchase Order Update Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = PurchaseOrder::destroy($id);
        if ($result) {
            return response()->json([
                'status' => true,
                'data' => null,
                'message' => 'Purchase Order Deleted Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'Purchase Order not found'
            ]);
        }
    }
}
