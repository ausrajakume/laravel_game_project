<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserGameRequest;
use App\Http\Requests\UpdateUserGameRequest;

class UserGamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add(Game $game)
    {
        if(!(DB::table('game_user')->where('game_id',$game->id)->exists())){
            $game->users()->attach([Auth::user()->id]);
            return redirect()->route('user.games.index');
        }
        return redirect()->route('user.games.index');
    }
     public function destroy(Game $game)
     {
        Auth::user()->games()->detach([$game->id]);
        $total = Game::cartPriceTotal(Auth::user()->games);
        return response()->json(['success' => true, 'data'=> ['price' => $total]])->getContent();
     }

}
