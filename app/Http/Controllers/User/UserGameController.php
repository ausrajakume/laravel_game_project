<?php

namespace App\Http\Controllers\User;

use App\Models\Game;
use App\Models\GameUser;
use App\Models\UserGame;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserGameController extends Controller
{
    public function index()
    {  
        $cartItems = Auth::user()?->games;
        $total = Game::cartPriceTotal($cartItems);
        $games = Game::get();
        return view('user.games.index', compact('games', 'cartItems', 'total'));
    }
    
    public function show(Game $game)
    {
        $cartItems = Auth::user()?->games;
        $total = (new Game)->cartPriceTotal($cartItems);
        return view('user.games.show', compact('game', 'cartItems', 'total'));
    }
}
