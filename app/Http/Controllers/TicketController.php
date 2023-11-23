<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = DB::table('tickets')
            ->join('cinemas', 'tickets.cinema_id', '=', 'cinemas.id')
            ->join('movies', 'tickets.movie_id', '=', 'movies.id')
            ->join('combos', 'tickets.combo_id', '=', 'combos.id')
            ->select(
                'tickets.*', 
                'cinemas.name as cinema_name', 
                'movies.image as movie_image', 
                'movies.price as movie_price',
                'combos.price as combo_price'
            )
            ->get();
        $tickets->map(function($ticket){
            $ticket->seat = explode(',', $ticket->seat);
            return $ticket;
        });
        return response()->json($tickets);
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
            'movie_id' => 'required',
            'number_tickets' => 'required',
            'seat' => 'required',
            'cinema_id' => 'required',
            'vat' => 'required'
        ]);
        $ticket = Ticket::create($request->all());
        return response()->json([
            'message' => 'ticket created',
            'ticket' => $ticket
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $ticket = Ticket::find($id);
        return $ticket;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
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
            'movie_id' => 'required',
            'number_tickets' => 'required',
            'seat' => 'required',
            'cinema_id' => 'required',
            'vat' => 'required'
        ]);
        $ticket = Ticket::find($request->input('id'));
        $ticket->movie_id = $request->input('movie_id');
        $ticket->number_tickets = $request->input('number_tickets');
        $ticket->seat = $request->input('seat');
        $ticket->cinema_id = $request->input('cinema_id');
        $ticket->openning_day = $request->input('openning_day');
        $ticket->show_time = $request->input('show_time');
        $ticket->vat = $request->input('vat');
        $ticket->combo_id = $request->input('combo_id');
        $ticket->number_combos = $request->input('number_combos');
        $ticket->save();
        
        return response()->json([
            'message' => 'ticket update',
            'ticket' => $ticket
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return response()->json([
            'message' => 'ticket deleted'
        ]);
    }
}
