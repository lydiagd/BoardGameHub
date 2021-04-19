<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Game()
    {
        return $this->belongsTo(Game::class);
    }

    public function getUser(){
        return User::Where('id', '=', $this->user_id)->first()->name;
    }

}
