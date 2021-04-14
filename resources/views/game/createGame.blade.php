@extends('layouts.main')

@section('title', 'New Game')
<title>New Game</title>
@section('content')
<form action="{{ route('games.store')}}" method="POST">
    @csrf

    {{-- NAME --}}
    <div class="mb-3">
            <label for="name" class="form-label">Name of the Game</label>
            <input type="text" name="name" id="name" class="form-control"  value="{{ old('name')}}">
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        {{-- CATEGORY --}}
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select 
                name="category" id="category" class="form-select" >
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                        {{ (string)$category->id === old('category') ? "Selected" : "" }}
                        >
                        {{-- can also use just a == instead --}}
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
            @error('category')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        {{-- GAME LINK --}}
        <div class="mb-3">
            <label for="link" class="form-label">Link to the Game</label>
            <input type="text" name="link" id="link" class="form-control" value="{{ old('link')}}">
            @error('link')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        {{-- PLAYER SIZE --}}
        <div class="mb-3">
            <label for="playerMin" class="form-label">Minimum Players</label>
            <input type="number" name="playerMin" id="playerMin" class="form-control" value="{{ old('playerMin')}}">
            @error('playerMin')
                <small class="text-danger">{{$message}}</small>
            @enderror

        </div>

        <div class="mb-3">

            <label for="playerMax" class="form-label">Maximum Players</label>
            <input type="number" name="playerMax" id="playerMax" class="form-control" value="{{ old('playerMax')}}">
            @error('playerMax')
                <small class="text-danger">{{$message}}</small>
            @enderror

        </div>

        {{-- AGE --}}
        <div class="mb-3">
            <label for="age" class="form-label">Minimum Age to Play</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ old('age')}}">
            @error('age')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        {{-- LENGTH --}}
        <div class="mb-3">
            <label for="length" class="form-label">Length of the Game (in minutes)</label>
            <input type="number" name="length" id="length" class="form-control" value="{{ old('length')}}">
            @error('length')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ old('description')}}">
            @error('description')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Create Game Entry
        </button>
    </form>
@endsection

