@extends('layouts.main')

@section('title')
New Review for {{$game->name}}
@endsection
<title>Creating New Review</title>
@section('content')
<form action="{{ route('review.store', ['id' => $game->id ])}}" method="POST">
    @csrf

    {{-- hidden input - game --}}
    <input name="game" type="hidden" value="{{$game->id}}">

     {{-- difficulty --}}
     <div class="mb-3">
        <label for="difficulty" class="form-label">How difficult was it to play {{$game->name}}? (Scale: 1- 10)</label>
        <input type="number" name="difficulty" id="difficulty" class="form-control"  value="{{ old('difficulty')}}">
        @error('difficulty')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="again"> Would you play this game again?</label>
        <input type="checkbox" id="again" name="again" value="1" {{ old('again') ? 'checked': true}}>
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">Please write a further review below:</label>
        <input type="text" name="body" id="body" class="form-control" value="{{ old('body')}}">
        @error('body')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>


    <button type="submit" class="btn btn-primary">
        Submit Review
    </button>
    <a class="button" href="{{ route('games.show', ['id' => $game->id ])}}">
        Cancel
    </a>
</form>
@endsection

