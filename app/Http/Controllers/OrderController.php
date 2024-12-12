<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::with(['user', 'digitalArt'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'digital_art_id' => 'required|exists:digital_arts,id',
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }
}
