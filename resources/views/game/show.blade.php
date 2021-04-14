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
            <th> {{$game->length}} minutes long </th>
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
    <h3> Reviews </h3>
    {{-- <table class="table table-striped"> --}}
        <td>
            <a href="{{ route('review.create', ['id' => $game->id ])}}">Add a New Review</a>
        </td>
        @foreach($reviews as $review)
        <div style="background-color:rgba(238, 222, 222, 0.047); text-align:center; vertical-align: middle; padding:40px 0;">
        <tr>
            <td>
                Description of Game:
            </td>
        </tr>
        </div>
        @endforeach
    {{-- </table> --}}
</body>
@endsection