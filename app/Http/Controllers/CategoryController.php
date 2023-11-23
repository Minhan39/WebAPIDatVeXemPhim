<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function get(){
        $categories = Category::all();
        $movies_categories = collect();
        foreach($categories as $item){
            $movies = Movie::whereRaw("FIND_IN_SET(?, category_list)", [$item->id])->get();

            $movies_categories[$item->id] = $movies->map(function($movie){
                $movie->category_list = explode(',', $movie->category_list);
                $movie->actor_list = explode(',', $movie->actor_list);
                $movie->language_list = explode(',', $movie->language_list);
                return $movie;
            });
        }
        return response()->json($movies_categories);
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
        $category = Category::create($request->all());
        return response()->json([
            'message' => 'category created', 
            'category' => $category
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $category = Category::find($id);
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
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
        $category = Category::find($request->input('id'));
        $category->name = $request->input('name');
        $category->image = $request->input('image');
        $category->save();

        return response()->json([
            'message' => 'category update',
            'category' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'message' => 'category deleted'
        ]);
    }
}
