@extends('layouts.main')

@section('title', 'Top Favorites List')
<title align="right">Top Favorites List</title>
@section('content')

@if($favorites->count() == 0)
<body style="background-color:rgba(182, 240, 248, 0.712);">
    <div class="text-end mb-3" align="left" >
        <h4> <i> No favorites added yet! </i> </h4>
    </div>
</body>

@else    
<body style="background-color:rgba(182, 240, 248, 0.712);">
    <div class="text-end mb-3" align="left" >

    <h4> Top 3 trending games favorited by other users!</h4>
    <table class="table">
        <thead>
        <tr>
            <th>Game:</th>
            <th>Player Limit:</th>
            <th>Ages:</th>
            <th>Category:</th>
            <th>Added By:</th>
            <th>Average Difficulty </th>
        </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td style="padding-left:5px;padding-bottom:26px;">
                    <strong style="font-size:20px;">
                        <a href="{{ route('games.show', ['id' => $game->game_id ])}}" style="color: #570a46c9">{{$game->gameName}} </a></strong>
                    <br/>
                    
                </td>
                <td>
                    {{$game->playerMin}}-{{$game->playerMax}} players
                </td>
                <td>
                    {{$game->ageMin}}+
                </td>
                <td>
                    {{$game->category->name}}
                </td>
                <td>
                    Added by {{$favorite->game->user}}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
@endif
@endsection