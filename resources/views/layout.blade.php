
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/starter-template/">

    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/starter-template/starter-template.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="{{ route('products.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                </li>

            </ul>
        </div>
        @guest
            <li class="nav-item navbar-nav">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            <li class="nav-item navbar-nav">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
        @endguest

        @auth
            <li class="nav-item navbar-nav">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
        @endauth
    </div>
</nav>

<main class="container">
    @if(session('success'))
        <div class="alert alert-success text-center"> {{ session('success') }} </div>
    @elseif(session('danger'))
        <div class="alert alert-danger text-center"> {{ session('danger') }} </div>
    @endif

    <div class="col text-center">
        <h1>@yield('title')</h1>
    </div>
    <div class="starter-template text-center py-2 px-3">
        @yield('content')
    </div>

</main>

<script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
