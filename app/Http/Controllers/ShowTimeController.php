<?php

namespace App\Http\Controllers;

use App\Models\ShowTime;
use Illuminate\Http\Request;

class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $show_times = ShowTime::all();
        return response()->json($show_times);
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
            'openning_day_id' => 'required',
            'time' => 'required'
        ]);
        $show_time = ShowTime::create($request->all());
        return response()->json([
            'message' => 'show time created',
            'show_time' => $show_time
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $show_time = ShowTime::find($id);
        return $show_time;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShowTime $showTime)
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
            'openning_day_id' => 'required',
            'time' => 'required'
        ]);
        $show_time = ShowTime::find($request->input('id'));
        $show_time->openning_day_id = $request->input('openning_day_id');
        $show_time->time = $request->input('time');
        $show_time->save();
        return response()->json([
            'message' => 'show time update',
            'show_time' => $show_time
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $show_time = ShowTime::find($id);
        $show_time->delete();
        return response()->json([
            'message' => 'show time deleted'
        ]);
    }
}
