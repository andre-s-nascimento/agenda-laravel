<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/9948612e5c.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand" href="#">Contatos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('agenda.index') }}">Inicio</a> <span
                            class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agenda.create') }}">Criar</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" action="{{ route('agenda.search') }}" method="post">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Pesquisar"
                        aria-label="Pesquisar" value="{{ old('search') ?? '' }}">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>
        @yield('content')
    </div>

</body>

</html>
