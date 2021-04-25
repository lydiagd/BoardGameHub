@extends('layouts.main')

@section('title')
    Are you sure you want to remove {{ $game->name }} from your Favorites List?
@endsection
<title align="center">delete favorite {{$game->name}}</title>
@section('content')


    <form action="{{ route('favorite.remove', [ 'id' => $favorite->id ]) }}" method="POST">
        @csrf
        <button type="submit" name = "submit" value = "Delete" class="btn btn-warning">
            Remove
        </button>
        <button type="submit" name = "submit" value = "Cancel" class="btn btn-primary">
            Cancel
        </button>
    </form>
@endsection