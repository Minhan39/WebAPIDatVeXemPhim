<?php

namespace App\Http\Controllers;

use App\Models\OpenningDay;
use Illuminate\Http\Request;

class OpenningDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $openning_days = OpenningDay::all();
        return response()->json($openning_days);
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
            'cinema_id' => 'required',
            'date' => 'required'
        ]);
        $openning_day = OpenningDay::create($request->all());
        return response()->json([
            'message' => 'openning day created',
            'openning_day' => $openning_day
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $openning_day = OpenningDay::find($id);
        return $openning_day;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OpenningDay $openningDay)
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
            'cinema_id' => 'required',
            'date' => 'required'
        ]);
        $openning_day = OpenningDay::find($request->input('id'));
        $openning_day->cinema_id = $request->input('cinema_id');
        $openning_day->date = $request->input('date');
        $openning_day->save();
        return response()->json([
            'message' => 'openning date update',
            'openning_day' => $openning_day
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $openning_day = OpenningDay::find($id);
        $openning_day->delete();
        return response()->json([
            'message' => 'openning date deleted'
        ]);
    }
}
