@extends('layouts.main')

@section('title', 'About Board Game Hub')
<title>About Board Game Hub</title>
@section('content')

<head>
    <style>
    h1 {text-align: left;}
    h3 {text-align: left;}
    p {text-align: center;}
    div {text-align: center;}
    </style>
    </head>

<div class="text-end mb-3" vertical-align:top>
    <h3>Welcome!</h3>
    <p>This site is meant to be an interactive community hub for online games, such a board games, card games, Escape Rooms,
      and more fun community games. Check out games other people have added in the '<a href="{{ route('games')}}"> All Games </a>'' tab. 
      Log in to add your own game links and save games in your 'Favorites' list. Have fun and game on! </p>
    <img src="{{url('/images/board-games.jpg')}}" alt="Image"/>
</div>
{{-- <div>
    
</div> --}}
     
    <tbody>
      
    </tbody>
@endsection
