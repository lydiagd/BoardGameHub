@extends('layouts.main')

@section('title', 'Profile')

@section('content')

<body style="background-color:rgba(182, 240, 248, 0.712);">
    <p>Hello, {{ $user->name }}. Your email is {{ $user->email }}.</p>

    <table class="table">
        <thead>
            <tr >
                <th>Options:</th>
            </tr>
        </thead>
            <tbody>
                <tr class="active">
                    <td >
                        <a href="{{ route('profile.favorites')}}"> Your Favorites List </a>
                    </td>
                </tr>
                <tr class="active">
                    <td>
                        <a href="{{ route('profile.mygames')}}"> Your Game Entries </a></h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="{{ route('games')}}"> View All Games </a> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="button" href="{{ route('auth.logout')}}">
                            Sign Out
                        </a>
                    </td>
                </tr>

            </tbody>
    </table>
</body>

@endsection