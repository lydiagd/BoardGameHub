<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Game extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function isFavorited()
    {
        return Favorite::where('game_id', '=', $this->id)->where('user_id', '=', Auth::User()->id)->first();
    }

    public function averageDifficulty()
    {
        $average = DB::table('reviews')->where('game_id', $this->id)->avg('difficulty');
        return round($average, 1);
        
    }
}
