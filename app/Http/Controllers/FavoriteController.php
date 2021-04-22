<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;

class FavoriteController extends Controller
{

    public function index()
    {
        $games = Favorite::With(['games', 'users'])->join('users', 'favorites.user_id', '=', 'users.id')
        ->join('games', 'games.id', '=', 'favorites.game_id')
        ->select('*', 'games.name as gameName', 'games.id as id', 'users.name as userName')
        ->orderBy('games.name')->get();

        return view('profile.favorites', [
            'games' => $games,
        ]);
        
    }

    public function add($id)
    {
        $game = Game::Where('id', '=', $id)->first();
        $this->authorize('view', $game);

        $favorite = new Favorite();
        $favorite->game_id = $id;
        $favorite->user_id = Auth::User()->id;
        $favorite->save();


        return redirect()
            ->route('games.show', ['id' => $id ])
            ->with('success', "Successfully added {$game->name} to your favorites list");
    }
}
