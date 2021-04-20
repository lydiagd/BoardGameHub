@extends('layouts.main')

@section('title', 'My Favorites List')
<title align="right">My Favorites List</title>
@section('content')

@if($games->count() == 0)
<body style="background-color:rgba(182, 240, 248, 0.712);">
    <div class="text-end mb-3" align="left" >
        <h3> No favorites added yet! </h3>
    </div>
</body>

@else    
<body style="background-color:rgba(182, 240, 248, 0.712);">
    <div class="text-end mb-3" align="left" >

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
                        <a href="{{ route('games.show', ['id' => $game->id ])}}" style="color: #570a46c9">{{$game->gameName}} </a></strong>
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
                    {{$game->user->name}}
                </td>
                <td>
                    @if($game->averageDifficulty() > 0)
                        {{$game->averageDifficulty()}} / 10 Difficulty
                    @else
                        No rating yet
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
@endif
@endsection