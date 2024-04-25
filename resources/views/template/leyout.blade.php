<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('leyouts/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="a
    nonymous"></script>
    <link href="{{ asset('leyouts/custom/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('leyouts/custom/style.css') }}" rel="stylesheet" />
</head>

<body>
    <header>
        @yield('header')
    </header>
    <main>
        @yield('main')
    </main>
    <footer>
        @yield('footer')
    </footer>
    <script src="{{ asset('leyouts/custom/scripts.js') }}"></script>
    <script src="{{ asset('leyouts/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
