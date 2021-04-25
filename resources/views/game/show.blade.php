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
            <th> Added By: {{$user->name}} </th>
            <td>{{$game->playerMin}} to {{$game->playerMax}} players</td>
            <td>Ages {{$game->ageMin}}+</td>
            <td> {{round($game->length)}} minutes long </td>
        </tr>
        <tr>
            <td>Category: {{$game->category->name}}  </td>
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
            <tr>
                <td>
                    @can('view', $game)
                    <form action="{{ route('favorite.add', ['id' => $game->id ])}}" method="POST">
                        @csrf
                        <span style="float:right;">
                            <strong style="font-size:20px;">
                                <button type="submit" class="btn btn-success" style="color: #000000c9">
                                    Add to Favorites
                                </button>
                                {{-- <a href="{{ route('favorite.add', ['id' => $game->id ])}}" class="btn btn-success" style="color: #ecd030c9">Add to Favorites </a> --}}
                            </strong>
                    </span>
                    </form>
                    @endcan
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
            <a href="{{ route('review.create', ['id' => $game->id ])}}" style="color: #570a46c9">Add a New Review</a>
        </td>
        <tbody>

            @foreach($reviews as $review)
            <div style="background-color:rgba(238, 222, 222, 0.047); text-align:left; font-size:16px; vertical-align: middle; padding:10px 0;">
   
                <h4>{{$review->getUser()}}</h4> 
                <p><br>Difficulty: {{$review->difficulty}}</p>

                <div class="box" >

                    <p>Would Play Again: {{$review->playAgain}}
                        <span style = "display:block; font-size:16px;">Review Content:</span></p>
                   
                    <p><br> {{$review->body}} </p>

                </div>
            </div>
            @endforeach
        </tbody>
    {{-- </table> --}}
</body>
@endsection