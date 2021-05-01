@extends('layouts.main')

@section('title')
    Are you sure you want delete your review for {{ $game->name }}?
@endsection
<title align="center">delete Review: {{$game->name}}</title>
@section('content')

    <form action="{{ route('review.remove', [ 'id' => $review->id ]) }}" method="POST">
        @csrf
        <button type="submit" name = "submit" value = "Delete" class="btn btn-warning">
            Delete
        </button>
        <button type="submit" name = "submit" value = "Cancel" class="btn btn-primary">
            Cancel
        </button>
    </form>
@endsection