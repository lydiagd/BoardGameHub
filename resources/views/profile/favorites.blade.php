@extends('layouts.main')

@section('title', 'My Favorites List')
<title align="right">My Favorites List</title>
@section('content')

@if($games->count() == 0)
<body style="background-color:rgba(182, 240, 248, 0.712);">
    <div class="text-end mb-3" align="left" >
        <h4> <i> No favorites added yet! </i> </h4>
    </div>
</body>

@else    
<body style="background-color:rgba(182, 240, 248, 0.712);">
    <div class="text-end mb-3" align="left" >

    <table class="table">
        <thead>
        <tr>
            <th>Game:</th>
            <th>Link:</th>
            {{-- <th>Player Limit:</th>
            <th>Ages:</th>
            <th>Category:</th>
            <th>Added By:</th>
            <th>Average Difficulty </th> --}}
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
                {{-- <td>
                    {{$game->playerMin}}-{{$game->playerMax}} players
                </td>
                <td>
                    {{$game->ageMin}}+
                </td> --}}
                {{-- <td>
                    {{$game->category->name}}
                </td> --}}
                <td>
                    {{$game->link}}
                </td>
                <td>
                    Added at {{$game->created_at}}
                </td>
                <td>
                    <a href="{{ route('favorite.removeForm', ['id' => $game->fav_id ])}}" class="btn btn-danger btn-sm">Remove from List </a></strong>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if($deletedFavorites->count() > 0)
    <h3> Deleted Games: </h3>
    <table class="table table-striped">
        @foreach($deletedFavorites as $df)
            <tr>
                <td>
                    {{$df->name}}
                </td>
                <td>
                    ----------
                </td>
                <td>
                    Deleted at: {{$df->deleted_at}}
                </td>
            </tr>
        @endforeach
    </table>
    @endif
    </div>
</body>
@endif
@endsection