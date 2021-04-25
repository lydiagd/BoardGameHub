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
        $games = Favorite::With(['game', 'user'])->join('users', 'favorites.user_id', '=', 'users.id')
        ->join('games', 'games.id', '=', 'favorites.game_id')
        ->select('*', 'games.name as gameName', 'games.id as game_id', 'favorites.id as fav_id', 
        'favorites.created_at as created_at')
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

    public function removeForm($id){
        // $favorite = Favorite::With(['game'])
        // ->join('games', 'games.id', '=', 'favorites.game_id')->where('id', '=', $id)
        // ->select('*', 'games.name as gameName', 'games.id as id')->get();

        $favorite = Favorite::Where('id', '=', $id)->first();

        $game = Game::Where('id', '=', $favorite->game_id)->first();


        return view('profile.deleteFavorite', [
            'favorite' => $favorite,
            'game' => $game,
        ]);
    }

    public function remove($id, Request $request){

        if($request->submit == "Delete")
        {
            //check if authorized to remove
        
            $favorite = Favorite::Where('id', '=', $id)->first();

            $game = Game::Where('id', '=', $favorite->game_id)->first();

            $favorite->delete();
            return redirect()
            ->route('profile.favorites')
            ->with('success', "Removed {$game->name} from your favorites list");
    
        }
        else if($request->submit == "Cancel")
        {
            return redirect()
            ->route('profile.favorites')->with('success', "Canceled removal");
            
        }

    }
}
