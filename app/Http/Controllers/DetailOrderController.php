<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\DetailOrder;

class DetailOrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'ticket_id' => 'required|exists:tickets,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);

        $subtotal = $ticket->harga * $request->jumlah;

        $detail = DetailOrder::create([
            'order_id' => $request->order_id,
            'ticket_id' => $request->ticket_id,
            'jumlah' => $request->jumlah,
            'subtotal' => $subtotal
        ]);

        return response()->json([
            'message' => 'Detail order berhasil dibuat',
            'data' => $detail
        ], 201);
    }

    public function index()
    {
        return response()->json(DetailOrder::all());
    }
}