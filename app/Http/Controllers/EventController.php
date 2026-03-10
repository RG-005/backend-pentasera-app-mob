<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return response()->json(Event::all());
    }

    public function store(Request $request)
    {
        $request->validate([
        'organizer_id' => 'required|exists:organizers,id',
        'nama_event' => 'required|string|max:150',
        'deskripsi' => 'nullable|string',
        'lokasi' => 'required|string|max:150',
        'event_datetime' => 'required|date',
        ]);

        $event = Event::create([
            'organizer_id' => $request->organizer_id,
            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'event_datetime' => $request->event_datetime,
            'event_status' => 'draft'
        ]);

        return response()->json([
            'message' => 'Event berhasil dibuat',
            'data' => $event
        ],201);
    }
}
