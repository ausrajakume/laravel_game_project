<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function store(Request $request)
{
    $game = new Game();
    $game->title = $request->input('title');
    $game->release_date = $request->input('release_date');
    $game->description = $request->input('description');
    $game->rating = $request->input('rating');
    $game->iframe = $request->input('iframe');
    $game->price = $request->input('price');
    
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save(public_path('/images/games/' . $filename));
        $game->image = $filename;
    }

    $game->save();

    return redirect()->route('admin.games.index')->with('success', 'Game added successfully!');
}

}
