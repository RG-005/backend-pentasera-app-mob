<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizer;

class OrganizerController extends Controller
{
    public function index()
    {
        return response()->json(Organizer::all());
    }

    public function store(Request $request)
    {
        $organizer = Organizer::create([
            'organizer_name' => $request->organizer_name,
            'deskripsi' => $request->deskripsi,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'address' => $request->address
        ]);

        return response()->json([
            'message' => 'Organizer berhasil dibuat',
            'data' => $organizer
        ],201);
    }
}

