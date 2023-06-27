<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/pulse.css') }}">
    <title>@yield('title') |Administration</title>
    <style>
        @layer reset
        {
            button
            {
                all:unset
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.property.index') }}">AGENCY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link  active" aria-current="page"
                        href="{{ route('admin.property.index') }}">Properties Management</a>
                    <a class="nav-link" href="{{ route('admin.option.index') }}">Options Management</a>
                    <div class="ms-auto">
                        @auth
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="nav-link">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="my-0">
                    @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </div>
</body>

</html>
