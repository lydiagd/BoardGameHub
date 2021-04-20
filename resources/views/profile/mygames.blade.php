@extends('layouts.main')

@section('title', 'My Games List')
<title align="right">My Game List</title>
@section('content')

    
<body style="background-color:rgba(182, 240, 248, 0.712);">
    <div class="text-end mb-3" align="left" >

        <a href="{{ route('games.create')}}"" style="color: #ffffffc9" class="btn btn-info"> Add a new game entry </a>

    <table class="table">
        <thead>
        <tr>
            <th>Entries:</th>
        </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td style="padding-left:5px;padding-bottom:26px;">
                    <strong style="font-size:20px;">
                        {{$game->name}}</strong>                    
                </td>
                <td> 
                    <div class="btn-group">
                        <a href="{{ route('games.show', ['id' => $game->id ])}}" class="btn btn-success btn-sm">Info </a></strong>
                        @can('update', $game)
                        <a href="{{ route('games.edit', ['id' => $game->id ])}}" class="button">
                            Edit Entry
                        </a>
                        @endcan
                        <a href="{{ route('games.show', ['id' => $game->id ])}}" class="btn btn-danger btn-sm">Delete </a></strong>
               
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
@endsection