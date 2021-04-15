<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Category;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index(){

        $games = Game::With(['user', ])->join('categories', 'categories.id', '=', 'games.category_id')->join('users', 'users.id', '=', 'games.user_id')
        // ->join('reviews', 'reviews.game_id', '=', 'games.id')
        ->select('*', 'games.name as gameName', 'games.id as id')->orderBy('games.name')->get();


        return view('game.games', [
            'games' => $games,
            // 'reviews' => $reviews,
            // 'difficulty' => $difficulty,
        ]);
    }

    public function show($id){

        $game = Game::Where('id', '=', $id)->first();

        $review1 = Review::Where('game_id', '=', $id)->first();

        $reviews = Review::Where('game_id', '=', $id);

        $user = User::Where('id', '=', $game->user_id)->first();

        return view('game.show', [
            'game' => $game,
            'reviews' => $reviews,
            'user' => $user,
            'review1' => $review1,
        ]);

    }

    public function create(){

        $categories = Category::All();

        return view('game.createGame', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:100', 
            'category' => 'required|exists:categories,id',
            'link' => 'required|max:200|unique:App\Models\Game,link',
            'playerMin' => 'required|integer|digits_between:1,100|gt:0',
            'playerMax' => 'required|integer|gt:0|gte:playerMin|digits_between:1,100',
            'age' => 'required|integer|gt:0|lte:21',
            'length' => 'required|integer',
            'description' => 'required'
        ]); 

        // $artist = Artist::where('id', '=', $request->input('artist'))->first();
        $categoryInput = Category::Where('id', '=', $request->input('category'))->first();

        $game = new Game();
        $game->name = $request->input('name');
        $game->category_id = $request->input('category');
        $game->link = $request->input('link');
        $game->playerMin = $request->input('playerMin');
        $game->playerMax = $request->input('playerMax');
        $game->ageMin = $request->input('age');
        $game->length = $request->input('length');
        $game->description = $request->input('description');
        $game->user_id = Auth::User()->id;
        $game->save();


        return redirect()
            ->route('games')
            ->with('success', "Successfully created game entry: {$request->input('name')}");

    }
}
