@extends('layouts.main')

@section('title')
    {{$game->name}} - Added By: {{$user->name}}
@endsection
<title align="center">{{$game->name}}</title>
@section('content')
<body style="background-color:rgb(151, 208, 223);">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{$game->playerMin}} to {{$game->playerMax}} players</th>
            <th>Ages {{$game->ageMin}}+</th>
        </tr>
        <tr>
            <th>Category:</th>
        </tr>
        <tr>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    Link to play: {{$game->link}}
                </td>
            
            </tr>

        </tbody>
    </table>
    <td>
        Description of Game:
    </td>
    <p>
        {{$game->description}}
    </p>
</body>
@endsection