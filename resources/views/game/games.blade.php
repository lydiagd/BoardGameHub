@extends('layouts.main')

@section('title', 'Games List')
<title align="right">All Games</title>
@section('content')
<style>
    a:link {
      color: rgb(204, 184, 235);
      background-color: transparent;
      text-decoration: none;
    }    
    a:hover {
      color: rgb(231, 187, 187);
      background-color: transparent;
      text-decoration: underline;
    }
    </style>
    
<body style="background-color:rgb(151, 208, 223);">
    @if(Auth::check())
    <div class="text-end mb-3" align="right" >
        <a href="{{ route('games.create')}}"> Add a new game entry </a>
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Game:</th>
            <th>Player Limit:</th>
            <th>Age Requirement:</th>
            <th>Category:</th>
            <th>Added By:</th>
        </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td>
                    <a href="{{ route('games.show', ['id' => $game->id ])}}">{{$game->gameName}} </a>
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
                {{-- <td>
                    @can('update', $album)
                    <a href="{{ route('albumE.edit', ['id' => $album->alb_id ])}}">
                        Edit
                    </a>
                    @endcan
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
@endsection