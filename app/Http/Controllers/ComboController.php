<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $combos = Combo::all();
        $combos->map(function($combo){
            $combo->description = explode(',', $combo->description);
            $combo->num = 0;
            return $combo;
        });
        return response()->json($combos);
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
            'name' => 'required',
            'price' => 'required'
        ]);
        $combo = Combo::create($request->all());
        return response()->json([
            'message' => 'combo created',
            'combo' => $combo
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $combo = Combo::find($id);
        return $combo;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Combo $combo)
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
            'name' => 'required',
            'price' => 'required'            
        ]);
        $combo = Combo::find($request->input('id'));
        $combo->name = $request->input('name');
        $combo->description = $request->input('description');
        $combo->price = $request->input('price');
        $combo->save();

        return response()->json([
            'message' => 'combo update',
            'combo' => $combo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $combo = Combo::find($id);
        $combo->delete();
        return response()->json([
            'message' => 'combo deleted'
        ]);
    }
}
