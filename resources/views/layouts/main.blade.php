{{-- code and bootstrap from https://therichpost.com/laravel-7-sidebar-responsive-template/ --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
        jQuery(document).ready(function($){
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        })
        </script>
        <style>
            .button {
                font: bold 11px Arial;
                text-decoration: none;
                background-color: #EEEEEE;
                color: #333333;
                padding: 6px 14px 6px 14px;
                display: inline-block;
                border-top: 1px solid #CCCCCC;
                border-right: 1px solid #333333;
                border-bottom: 1px solid #333333;
                border-left: 1px solid #CCCCCC;
            }

            .box{
                display: flex;
                /* justify-content: center; */
                /* align-items: center; */
                border: 2px solid black;
                background-color: rgba(19, 1, 80, 0.322);
                 color: white;
                padding: 5px; 
            }

            body {
        overflow-x: hidden;
        }
        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }
        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
        }
        #sidebar-wrapper .list-group {
        width: 15rem;
        }
        #page-content-wrapper {
        min-width: 100vw;
        }
        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }
        @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }
        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
        }
        </style>    
    </head>
    <body>
                <div class="d-flex" id="wrapper">
                <!-- Sidebar -->
                <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">Menu </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('main') }}" class="list-group-item list-group-item-action bg-light">Main Dashboard</a>
                    <a href="{{ route('about') }}" class="list-group-item list-group-item-action bg-light">About</a>
                    <a href="{{ route('games')}}" class="list-group-item list-group-item-action bg-light">All Games</a>
                    {{-- <a href="{{ route('allfavorites')}}" class="list-group-item list-group-item-action bg-light">User's Favorites</a> --}}
                    @if (Auth::check())
                            <a href="{{ route('profile.index') }}" class="list-group-item list-group-item-action bg-light">Profile</a>
                            <form method="post" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit" class="list-group-item list-group-item-action bg-light">Logout</button>
                            </form>
                    @else
                            <a href="{{ route('registration.index') }}" class="list-group-item list-group-item-action bg-light">Sign up</a>
                            <a href="{{ route('auth.loginForm') }}" class="list-group-item list-group-item-action bg-light">Login</a>
                    @endif
                </div>
                </div>
                <!-- /#sidebar-wrapper -->
                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                        
                        <button class="button" id="menu-toggle">Toggle Menu</button>
                        @if (Auth::check())
                            <a style="color:rgb(81, 117, 216);display:block;padding:10px" >Hello, {{Auth::user()->name}} </a>
                        @endif
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                <li class="nav-item active">
                                <a class="nav-link" href="{{ route('main') }}">Main Dashboard <span class="sr-only">(current)</span></a>
                                </li>
                                {{-- <li class="nav-item">
                                <a class="nav-link" href="#">My Favorites</a>
                                </li> --}}
                                @if(Auth::check())
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.favorites') }}">My Favorites</a>
                                    <a class="dropdown-item" href="{{ route('profile.mygames') }}">My Games</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="post" action="{{ route('auth.logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item" style="color:rgb(231, 18, 18)">Log Out</button>
                                    </form>
                                </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </nav>

                    <div class="col-9">
                        <header>
                            <h2>@yield('title')</h2>
                        </header>
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <main>
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @yield('content')
                        </main>
                    </div>
                </div>
            {{-- </div>
        </div> --}}
        <!-- /#wrapper -->
    </body>
</html>