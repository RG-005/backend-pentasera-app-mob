<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_harga' => 'required|numeric|min:0'
        ]);

        $order = Order::create([
            'user_id' => $request->user_id,
            'tanggal_order' => now(),
            'total_harga' => $request->total_harga,
            'status_order' => 'pending'
        ]);

        return response()->json([
            'message' => 'Order berhasil dibuat',
            'data' => $order
        ], 201);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return response()->json($order);
    }
}