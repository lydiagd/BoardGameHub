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
            <th> {{round($game->length)}} minutes long </th>
        </tr>
        <tr>
            <th>Category: {{$game->category->name}} </th>
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
     <h3>   Description of Game: </h3>
    <p>
        {{$game->description}}
    </p>
    <h3>------------------------------------------------------------------------------</h3>
    <h3 align="center"> Reviews </h3>
    {{-- <table class="table table-striped"> --}}
        <td>
            <a href="{{ route('review.create', ['id' => $game->id ])}}">Add a New Review</a>
        </td>
        <tbody>

            {{-- @foreach($reviews as $review) --}}
            <td>
                HERE {{$review1->difficulty}}
            </td>
            <div style="background-color:rgba(238, 222, 222, 0.047); text-align:center; vertical-align: middle; padding:40px 0;">
                <tr>
                    <td>
                        Difficulty: {{$review1->difficulty}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Review Content: {{$review1->body}}
                    </td>
                </tr>
            </div>
            {{-- @endforeach --}}
        </tbody>
    {{-- </table> --}}
</body>
@endsection