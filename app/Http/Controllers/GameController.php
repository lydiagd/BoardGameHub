<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Category;

class GameController extends Controller
{
    function index(){

        $games = Game::With(['user'])->join('categories', 'categories.id', '=', 'games.category_id')->join('users', 'users.id', '=', 'games.user_id')
        ->select('*')->orderBy('games.name')->get();

        return view('game.games', [
            'games' => $games,
        ]);
    }

    function create(){

        $categories = Category::All();

        return view('game.createGame', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:100', 
            'category' => 'required|exists:categories,id',
        ]); //|max:20 means max characters entered is 20; exists rule means it must be in the table

        // $artist = Artist::where('id', '=', $request->input('artist'))->first();

        // $album = new Album();
        // $album->title = $request->input('title');
        // $album->artist_id = $artist->id;
        // $album->user_id = Auth::user()->id;
        // $album->save();


        // return redirect()
        //     ->route('albumE.index')
        //     ->with('success', "Successfully created album {$artist->name} - {$request->input('title')}");

    }
}
