<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'release_date' => 'required|date',
        'description' => 'required',
        'rating' => 'required|integer|min:1|max:5',
        'iframe' => 'required|url',
        'price' => 'required|numeric|min:0',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $game = new Game;
    $game->title = $validatedData['title'];
    $game->release_date = $validatedData['release_date'];
    $game->description = $validatedData['description'];
    $game->rating = $validatedData['rating'];
    $game->iframe = $validatedData['iframe'];
    $game->price = $validatedData['price'];

    $imageName = time().'.'.$request->image->extension();  
    $request->image->move(public_path('images'), $imageName);
    $game->image = $imageName;

    $game->save();

    return redirect()->route('admin.games.index')
        ->with('success','Game added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
