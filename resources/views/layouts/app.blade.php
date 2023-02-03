<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('js/app.js')}}" defer></script>
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Blogs</title>
</head>
<body>
    <div id="app">
    <header>
        <h1>Blogs</h1>
        <ul>
            <li><a href="/" class="@yield('Sakumlapa')">Sākumlapa</a></li>
            <li><a href="/post" class="@yield('Visi')">Visi ieraksti</a></li>
            <li><a href="/dashboard" class="@yield('Statistika')">Statistika</a></li>
        </ul>
    </header>
    <div class="content">
        @yield('content')
    </div>
</div>
</body>
</html>