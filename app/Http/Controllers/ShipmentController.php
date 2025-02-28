<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class ShipmentController extends Controller 
{
    public function index()
    {
        // Get shipments and eager load relationships
        $shipments = Shipment::with(['sale' => function($query) {
                return $query->withoutGlobalScopes();  // This allows loading soft deleted sales
            }, 'sale.client', 'sale.warehouse'])
            ->orderBy('id', 'desc')
            ->paginate(10);
            
        return view('sales.shipments', compact('shipments'));
    }

    public function edit($id)
    {
        $shipment = Shipment::findOrFail($id);
        return response()->json(['shipment' => $shipment]);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:ordered,packed,shipped,delivered,cancelled',
            'delivered_to' => 'nullable|string',
            'shipping_address' => 'nullable|string',
            'shipping_details' => 'nullable|string'
        ]);
    
        $shipment = Shipment::findOrFail($id);
        $shipment->update($request->only([
            'status',
            'delivered_to',
            'shipping_address',
            'shipping_details'
        ]));
    
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        try {
            $shipment = Shipment::findOrFail($id);
            
            // Optional: Check if shipment can be deleted
            if ($shipment->status === 'delivered') {
                return response()->json([
                    'success' => false,
                    'message' => __('Cannot delete delivered shipment')
                ], 403);
            }
            
            $shipment->delete();
            
            return response()->json([
                'success' => true,
                'message' => __('Shipment deleted successfully')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('Error occurred while deleting shipment')
            ], 500);
        }
    }
}