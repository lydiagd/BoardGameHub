@extends('layouts.main')

@section('title')
New Review for {{$game->name}}
@endsection
<title>Creating New Review</title>
@section('content')
<form action="{{ route('games.store')}}" method="POST">
    @csrf

    {{-- NAME --}}
    <div class="mb-3">
        <label for="difficulty" class="form-label">How difficult was it to play {{$game->difficulty}}? (Scale: 1- 10)</label>
        <input type="number" difficulty="difficulty" id="difficulty" class="form-control"  value="{{ old('difficulty')}}">
        @error('difficulty')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="mb-3">
        <input type="checkbox" id="again" name="again" value="1" >
        <label for="again"> Would you play this game again?</label>
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
</form>
@endsection

