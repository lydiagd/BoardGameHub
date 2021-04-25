@extends('layouts.main')

@section('title')
    Are you sure you want to permanently delete {{ $game->name }} for everyone?
@endsection
<title align="center">delete game: {{$game->name}}</title>
@section('content')

    <h6> (this action cannot be undone) </h6>
    <form action="{{ route('profile.deleted', [ 'id' => $game->id ]) }}" method="POST">
        @csrf
        <button type="submit" name = "submit" value = "Delete" class="btn btn-warning">
            Delete
        </button>
        <button type="submit" name = "submit" value = "Cancel" class="btn btn-primary">
            Cancel
        </button>
    </form>
@endsection