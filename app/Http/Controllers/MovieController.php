<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        $movies->map(function($movie){
            $movie->actor_list = explode(',', $movie->actor_list);
            $movie->language_list = explode(',', $movie->language_list);
            return $movie;
        });
        return response()->json($movies);
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
        $movie = Movie::create($request->all());
        return response()->json([
            'message' => 'movie created', 
            'movie' => $movie
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $movie = Movie::find($id);
        return $movie;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
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
        $movie = Movie::find($request->input('id'));
        $movie->name = $request->input('name');
        $movie->image = $request->input('image');
        $movie->category_list = $request->input('category_list');
        $movie->video = $request->input('video');
        $movie->description = $request->input('description');
        $movie->studio = $request->input('studio');
        $movie->director = $request->input('director');
        $movie->actor_list = $request->input('actor_list');
        $movie->language_list = $request->input('language_list');
        $movie->price = $request->input('price');
        $movie->save();
        return response()->json([
            'message' => 'movie update',
            'movie' => $movie
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return response()->json([
            'message' => 'movie deleted'
        ]);
    }
}
