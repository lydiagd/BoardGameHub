<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index(){

        $games = Game::With(['user'])->join('categories', 'categories.id', '=', 'games.category_id')->join('users', 'users.id', '=', 'games.user_id')
        ->select('*', 'games.name as gameName', 'games.id as id')->orderBy('games.name')->get();

        $categories = Category::All();


        return view('game.games', [
            'games' => $games,
            'categories' => $categories,
            // 'difficulty' => $difficulty,
        ]);
    }

    public function show($id){

        $game = Game::Where('id', '=', $id)->first();

        // $review1 = Review::Where('game_id', '=', $id)->first();

        $reviews = Review::Where('game_id', '=', $id)
        // ->join('users', 'users.id', '=', 'review.user_id')
        // ->select('*', 'reviews.id as id', 'users.name as username')
        ->orderBy('reviews.id', 'desc')->get();

        $user = User::Where('id', '=', $game->user_id)->first();

        $totalFavorites = Favorite::Where('game_id', '=', $id)->get();

        return view('game.show', [
            'game' => $game,
            'reviews' => $reviews,
            'user' => $user,
            'totalFavorites' => $totalFavorites,
        ]);

    }

    // SEARCHING

    public function search(Request $request){

        $request->validate([
            'query' => 'max:100', 
            // 'category' => 'exists:categories,id',
        ]); 

        //query here
        if(is_null($request->input('query')))
        {
            $results_search = null;
        }
        else{
            $searchBar = "%".$request->input('query')."%";
            $results_search = Game::query()->where('name', 'LIKE', $searchBar)->orderBy('games.name')->get();
        }

        $results_category = Game::Where('category_id', '=', $request->input('category'))->orderBy('games.name')->get();

        $category = Category::Find($request->input('category'));


        return view('game.search', [
            'results_category' => $results_category,
            'results_search' => $results_search,
            'category' => $category,
            'search' => $request->input('query'),
        ]);

    }

    // CREATING

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
            'playerMax' => 'required|integer|gt:0|gte:playerMin|lte:100',
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
            ->route('profile.mygames')
            ->with('success', "Successfully created game entry: {$request->input('name')}");

    }

    // editing entries
    public function edit($id)
    {
        $game = Game::Where('id', '=', $id)->first();
        $categories = Category::All();

        return view('game.edit', [
            'categories' => $categories,
            'game' => $game,
        ]);

    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:100', 
            'category' => 'required|exists:categories,id',
            'link' => 'required|max:200',
            'playerMin' => 'required|integer|digits_between:1,100|gt:0',
            'playerMax' => 'required|integer|gt:0|gte:playerMin|lte:100',
            'age' => 'required|integer|gt:0|lte:21',
            'length' => 'required|integer',
            'description' => 'required'
            // do this for link: https://stackoverflow.com/questions/45810009/laravel-conditional-unique-validation
        ]); 

        $game = Game::where('id', '=', $id)->first();
        
        $this->authorize('update', $game);

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
            ->route('games.show', ['id' => $game->id ])
            ->with('success', "Successfully edited game entry: {$request->input('name')}");


    }
}
