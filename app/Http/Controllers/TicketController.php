<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        return response()->json(Ticket::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'kategori' => 'required|string|max:50',
            'harga' => 'required|numeric',
            'kuota' => 'required|integer|min:1'
        ]);

        $ticket = Ticket::create([
            'event_id' => $request->event_id,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'kuota' => $request->kuota,
            'sisa_kuota' => $request->kuota
        ]);

        return response()->json([
            'message' => 'Ticket berhasil dibuat',
            'data' => $ticket
        ], 201);
    }
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return response()->json($ticket);
    }
}
