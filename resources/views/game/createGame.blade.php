@extends('layouts.main')

@section('title', 'New Game')
<title>New Game</title>
@section('content')
<form action="{{ route('games.store')}}" method="POST">
    @csrf
    <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name')}}">
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
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
        <button type="submit" class="btn btn-primary">
            Create Game Entry
        </button>
    </form>
@endsection

