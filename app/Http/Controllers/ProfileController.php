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

    public function deleteGame($id)
    {
        $game = Game::Where('id', '=', $id)->first();

        return view('profile.deleteGame', [
            'game' => $game,
        ]);
    }

    public function deleted($id, Request $request)
    {
        if($request->submit == "Delete")
        {
            //check if authorized to remove
        
            $game = Game::Where('id', '=', $id)->first();

            $this->authorize('delete', $game);

            $name = $game->name;

            $game->delete();
            return redirect()
            ->route('profile.mygames')
            ->with('success', "Removed {$name} from the Hub");
    
        }
        else if($request->submit == "Cancel")
        {
            return redirect()
            ->route('profile.mygames')->with('error', "Canceled removal");
            
        }
    }


    
}
