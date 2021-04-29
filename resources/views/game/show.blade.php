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
                    @if($game->isFavorited())
                    <span style="float:right;">
                        <a href="{{ route('favorite.removeForm', ['id' => $game->isFavorited() ])}}" class="btn btn-danger btn-sm">Remove from Favorite List </a></strong>
                    </span>
                    @else
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
                    @endif
                    @endcan
                </td>
            </tr>

        </tbody>
    </table>
     <h4>   Description of Game: </h4>
    <p>
        {{$game->description}}
    </p>
    <h3>-----------------------------------------------------------------------------</h3>
    <h3 align="center"> Reviews </h3>
    {{-- <table class="table table-striped"> --}}
        <td>
            <a href="{{ route('review.create', ['id' => $game->id ])}}" style="color: #570a46c9">Add a New Review</a>
        </td>
        <tbody>

            @foreach($reviews as $review)
            <div style="background-color:rgba(238, 222, 222, 0.047);  font-size:16px">

                <h4>{{$review->getUser()}}</h4> 
                <div class="box">
                <p>Difficulty: {{$review->difficulty}} / 10 <br>
                Rating: {{$review->rating}} / 10 </p>

                    <p style="text-align:right;">
                    Would Play Again:
                        <?php if($review->playAgain == 1) { ?>
                        Yes
                        <?php } else {?>
                        No
                        <?php } ?>
                    </p>
                        <span style = "display:block; font-size:16px;"><p><br>Review Content:</p></span>
                   
                    <p><br> {{$review->body}} </p>

                </div>
            </div>
            @endforeach
        </tbody>
    {{-- </table> --}}
</body>
@endsection