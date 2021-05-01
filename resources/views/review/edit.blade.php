@extends('layouts.main')

@section('title')
Edit Review: {{$game->name}}
@endsection
<title>Edit Review: {{$game->name}}</title>
@section('content')
<form action="{{ route('review.update', ['id' => $review->id ])}}" method="POST">
    @csrf

    <button type="Submit" name = "submit" value = "Delete" class="btn btn-warning">
        Delete Review
    </button>

    {{-- hidden input - game --}}
    <input name="game" type="hidden" value="{{$game->id}}">

     {{-- difficulty --}}
     <div class="mb-3">
        <label for="difficulty" class="form-label">How difficult was it to play {{$game->name}}? (Scale: 1- 10)</label>
        <input type="number" name="difficulty" id="difficulty" class="form-control"  value="{{ old('difficulty', $review->difficulty)}}">
        @error('difficulty')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    {{-- rating --}}
    <div class="mb-3">
        <label for="rating" class="form-label">Rate this game from 1 to 10</label>
        <input type="number" name="rating" id="rating" class="form-control"  value="{{ old('rating', $review->rating)}}">
        @error('rating')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="again"> Would you play this game again?</label>
        <input type="checkbox" id="again" name="again" value="1" {{ old('again', $review->playAgain) ? 'checked': true}}>
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">Please write a further review below:</label>
        <input type="text" name="body" id="body" class="form-control" value="{{ old('body', $review->body)}}">
        @error('body')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>


    <button type="submit" name = "submit" class="btn btn-primary" value = "Update">
        Submit Updated Review
    </button>
    <a class="button" href="{{ route('games.show', ['id' => $game->id ])}}">
        Cancel
    </a>
</form>
@endsection

