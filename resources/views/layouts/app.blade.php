<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Simple Search</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col col-md-3">
            <br>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{route('home')}}">Developer Search</a>
        </li>

        <li class="list-group-item list-group-item-danger">
            <a href="{{route('programminglanguage.index')}}">Programming Language</a>
        </li>
        <li class="list-group-item list-group-item-warning">
            <a href="{{route('language.index')}}">Language</a>
        </li>
        <li class="list-group-item list-group-item-primary">
            <a href="{{route('developer.index')}}">Developer</a>
        </li>
    </ul>
        </div>
        <div class="col col-md-9">
    @yield('content')
        </div>
    </div>
</div>

</body>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</html>