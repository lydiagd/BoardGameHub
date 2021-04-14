<?php

namespace App\Http\Controllers;
use App\Models\Game;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create($id){

        $game = Game::Where('id', '=', $id)->first();

        return view('review.create', [
            'game' => $game,

        ]);


    }
}
