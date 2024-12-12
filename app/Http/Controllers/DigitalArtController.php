<?php

namespace App\Http\Controllers;

use App\Models\DigitalArt;
use Illuminate\Http\Request;

class DigitalArtController extends Controller
{
    public function index()
    {
        return response()->json(DigitalArt::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'low_res_path' => 'required|string',
            'high_res_path' => 'required|string',
        ]);

        $digitalArt = DigitalArt::create($request->all());
        return response()->json($digitalArt, 201);
    }

    public function show($id)
    {
        $digitalArt = DigitalArt::findOrFail($id);
        return response()->json($digitalArt);
    }

    public function update(Request $request, $id)
    {
        $digitalArt = DigitalArt::findOrFail($id);
        $digitalArt->update($request->all());
        return response()->json($digitalArt);
    }

    public function destroy($id)
    {
        $digitalArt = DigitalArt::findOrFail($id);
        $digitalArt->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
