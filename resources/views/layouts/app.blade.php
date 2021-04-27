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
        @yield('content')
    </div>

</body>

</html>
