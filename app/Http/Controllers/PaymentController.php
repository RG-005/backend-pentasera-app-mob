<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json(Payment::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'metode' => 'required|string|max:50',
            'jumlah_bayar' => 'required|numeric|min:0'
        ]);

        $payment = Payment::create([
            'order_id' => $request->order_id,
            'metode' => $request->metode,
            'jumlah_bayar' => $request->jumlah_bayar,
            'status_pembayaran' => 'paid',
            'waktu_bayar' => now()
        ]);

        $order = Order::findOrFail($request->order_id);
        $order->update([
            'status_order' => 'paid'
        ]);

        return response()->json([
            'message' => 'Payment berhasil dibuat',
            'data' => $payment
        ], 201);
    }
}