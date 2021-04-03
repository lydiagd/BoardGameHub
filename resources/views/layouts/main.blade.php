<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-3">
                {{-- <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/invoices">Invoices</a>
                    </li>
                </ul> --}}

                <nav>
                    <ul class="menu">
                      <li class="logo"><a href="#">Creative Mind Agency</a></li>
                      <li class="subitem"><a href="#">Development</a></li>
                        <li class="subitem"><a href="#">SEO</a></li>
                        <li class="subitem"><a href="#">Copywriting</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-9">
                <header>
                    <h2>@yield('title')</h2>
                </header>
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>


