<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Favorite;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'user' => Auth::user(),
        ]);
    }

    public function mygames()
    {
        $games = Game::Where('user_id', '=', Auth::user()->id)->orderBy('games.name')->get();

        return view('profile.mygames', [
            'games' => $games,
        ]);
    }

    public function favorites()
    {
        $games = Favorite::With(['games', 'users'])->join('users', 'favorites.user_id', '=', 'users.id')
        ->join('games', 'games.id', '=', 'favorites.game_id')
        ->select('*', 'games.name as gameName', 'games.id as id', 'users.name as userName')
        ->orderBy('games.name')->get();

        return view('profile.favorites', [
            'games' => $games,
        ]);
    }
}
