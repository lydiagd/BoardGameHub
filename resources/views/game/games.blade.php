@extends('layouts.main')

@section('title', 'Games List')
<title align="right">All Games </title>
@section('content')


{{-- search bar --}}
<form action="{{ route('games.search')}}" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group" >
        <input type="text" class="form-control" name="query" id="query"
            placeholder="Search Games" style="padding-left:5px;padding-bottom:3px;"> <span class="input-group-btn"></span>
        @error('query')
            <small class="text-danger">{{$message}}</small>
        @enderror

        <select 
            name="category" id="category" class="form-select" style="padding-left:-3px;padding-bottom:3px;">
            <option value="">-- Search by Category --</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                    {{ (string)$category->id === old('category') ? "Selected" : "" }}
                    >
                    {{$category->name}}
                </option>
            @endforeach
        </select>
        @error('category')
            <small class="text-danger">{{$message}}</small>
        @enderror

    <button type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-search"></span>
        SEARCH
    </button>
    </div>
        
</form>


    
<body style="background-color:rgb(151, 208, 223);">
    <div class="text-end mb-3" align="left" >
    {{-- @if(Auth::check()) --}}
        <a href="{{ route('games.create')}}"" style="color: #ffffffc9" class="btn btn-info"> Add a new game entry </a>
    {{-- @else
    <a href="{{ route('auth.login')}}" style="color: #570a46c9" > Add a new game entry </a>
    @endif --}}

    <table class="table table-striped">
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
                <td> 
                    {{-- make it so if you're authorized to edit entry, you can do so --}}
                    @can('update', $game)
                    <a href="{{ route('games.edit', ['id' => $game->id ])}}" class="button">
                        Edit Entry
                    </a>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
@endsection