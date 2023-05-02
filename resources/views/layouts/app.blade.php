<!doctype html>
<html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/diapo.js', 'resources/js/app.js', 'resources/js/banner.js'])

    <script src="https://kit.fontawesome.com/50ab74dd38.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>




<body>
    @include('components.header')


    @yield('content')
    @include('components.footer')
</body>

</html>
