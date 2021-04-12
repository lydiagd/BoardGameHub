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
            'link' => 'required|max:200',
            'playerMin' => 'required|integer|digits_between:1,100|gt:0',
            'playerMax' => 'required|integer|gt:0|gte:playerMin|digits_between:1,100',
            'age' => 'required|integer|digits_between:1,18',
            'length' => 'required',
            'description' => 'required'
        ]); 

        // $artist = Artist::where('id', '=', $request->input('artist'))->first();
        $categoryInput = Category::Where('id', '=', $request->input('category'))->first();

        $game = new Game();
        $game->name = $request->input('name');
        $game->category = $categoryInput;
        $game->link = $request->input('link');
        $game->playerMin = $request->input('playerMin');
        $game->playerMax = $request->input('playerMax');
        $game->ageMin = $request->input('ageMin');
        $game->length = $request->input('length');
        $game->description = $request->input('description');
        $game->save();


        return redirect()
            ->route('games')
            ->with('success', "Successfully created game entry: {$request->input('name')}");

    }
}
