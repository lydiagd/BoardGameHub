<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Favorite extends Model
{
    use HasFactory;

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeDeletedFav(){
        return Game::onlyTrashed()->join('favorites', 'favorites.game_id', '=', 'games.id')
        ->select('*', 'games.name as gameName', 'games.id as game_id', 'favorites.user_id as favuser_id', 'favorites.game_id as favegame_id')
        ->where('favorites.user_id', '=', Auth::User()->id)->get();
    }
}
