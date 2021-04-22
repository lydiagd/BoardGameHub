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
            <th>Entries: {{$games->count()}}</th>
        </tr>
        </thead>
        <tbody>
        @if($games->count() == 0)
            <body style="background-color:rgba(182, 240, 248, 0.712);">
                <div class="text-end mb-3" align="left" >
                    <h4><i> You have not added any games to the Hub yet </i> </h4>
                </div>
            </body>

        @else  
        @foreach($games as $game)
            <tr>
                <td style="padding-left:5px;padding-bottom:26px;">
                    <strong style="font-size:20px;">
                        {{$game->name}}</strong>                    
                </td>
                <td>
                    <i>Updated at: {{$game->updated_at}} </i>
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
        @endif
        </tbody>
    </table>
    </div>
</body>

@endsection