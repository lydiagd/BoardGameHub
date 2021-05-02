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


        $this->authorize('create', App\Models\Review::class);

        $game = Game::Where('id', '=', $id)->first();

        return view('review.create', [
            'game' => $game,

        ]);


    }

    public function store(Request $request){
        $request->validate([
            'difficulty' => 'required|integer|lte:10|gt:0',
            'rating' => 'required|integer|lte:10|gt:0',
            'body' => 'required',
        ]); 

        $this->authorize('create', App\Models\Review::class);

        $review = new Review();
        $review->game_id = $request->input('game');
        $review->user_id = Auth::User()->id;
        $review->difficulty = $request->input('difficulty');
        $review->rating = $request->input('rating');
        $review->body = $request->input('body');
        if( $request->input('again') == 1){
            
            $review->playAgain = TRUE;
        }
        else{
            $review->playAgain = FALSE;
        }
        $review->save();

        return redirect()->route('games.show',['id' => $request->input('game')])->with('success', "Added Review for {$request->input('game')}");
    }

    public function edit($id)
    {

        $review = Review::Where('id', '=', $id)->first();

        $this->authorize('update', $review);
        $game = Game::Where('id', '=', $review->game_id)->first();

        return view('review.edit', [
            'game' => $game,
            'review' => $review,

        ]);

    }

    public function update($id, Request $request){
        // dd($request->submit);

        $review = Review::Where('id', '=', $id)->first();
        // dd($request->submit);

        if($request->submit == "Delete")
        {
            //redirect
            // dd(2);
            return redirect()->route('review.removeForm', ['id' => $review->id ]);
            // ->with('error', "Canceled removal");
        }
        else if($request->submit == "Update"){
            //submit
            // dd(1);
            $request->validate([
                'difficulty' => 'required|integer|lte:10|gt:0',
                'rating' => 'required|integer|lte:10|gt:0',
                'body' => 'required',
            ]); 

            $review->game_id = $request->input('game');
            $review->user_id = Auth::User()->id;
            $review->difficulty = $request->input('difficulty');
            $review->rating = $request->input('rating');
            $review->body = $request->input('body');
            if( $request->input('again') == 1){
                
                $review->playAgain = TRUE;
            }
            else{
                $review->playAgain = FALSE;
            }
            $review->save();

            return redirect()->route('games.show',['id' => $request->input('game')])->with('success', "Updated Review for {$request->input('game')}");
   

        }

    }

    public function removeForm($id){

        $review = Review::Where('id', '=', $id)->first();

        $this->authorize('delete', $review);
        $game = Game::Where('id', '=', $review->game_id)->first();

        return view('review.delete', [
            'game' => $game,
            'review' => $review,

        ]);

    }

    public function remove($id, Request $request){

        $review = Review::Where('id', '=', $id)->first();
        
        $game = Game::Where('id', '=', $id)->first();

        $this->authorize('delete', $review);

        if($request->submit == "Delete")
        {
            //check if authorized to remove

            $review->delete();

            return redirect()
            ->route('games.show',['id' => $game->id])
            ->with('success', "Removed your review for {$game->name}");
    
        }
        else if($request->submit == "Cancel")
        {
            return redirect()
            ->route('games.show',['id' => $game->id])->with('error', "Canceled review removal");
            
        }

    }
}
