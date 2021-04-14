<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create($id){

        $game = Game::Where('id', '=', $id)->first();

        return view('review.create', [
            'game' => $game,

        ]);


    }

    public function store(Request $request){
        $request->validate([
            'difficulty' => 'required|integer|lt:10|gt:0',
            'body' => 'required',
        ]); 

        $review = new Review();
        $review->game_id = $request->input('game');
        $review->user_id = Auth::User()->id;
        $review->difficulty = $request->input('difficulty');
        if( $request->input('again') == 1){
            
            $review->playAgain = TRUE;
        }
        else{
            $review->playAgain = FALSE;
        }
        $review->save();

        // return redirect()
        //     ->route('games')
        //     ->with('success', "Successfully created game entry: {$request->input('name')}");
    }
}
