<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cinemas = Cinema::all();
        return $cinemas;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $cinema = Cinema::create($request->all());
        return response()->json([
            'message' => 'cinema created',
            'cinema' => $cinema
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $cinema = Cinema::find($id);
        return $cinema;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cinema $cinema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required'
        ]);
        $cinema = Cinema::find($request->input('id'));
        $cinema->name = $request->input('name');
        $cinema->save();

        return response()->json([
            'message' => 'cinema update',
            'cinema' => $cinema
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $cinema = Cinema::find($id);
        $cinema->delete();
        return response()->json([
            'message' => 'cineme deleted'
        ]);
    }
}
