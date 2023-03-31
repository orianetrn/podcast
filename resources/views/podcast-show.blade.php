<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$podcast->title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
<header class="header">
    <div class="header__logo">
        <a href="{{ route('home') }}">
            <img class="logo" src="{{asset('logo.png')}}" alt="logo">
        </a>
    </div>
    <nav class="header__nav">
        <ul class="header__nav__menu">
            @auth
                <li class="header__nav__menu__link">
                    <a href="{{ route('podcasts.index') }}">Gérer les podcasts</a>
                </li>
                <li class="header__nav__menu__link">
                    <a href="{{ route('logout') }}">Déconnection</a>
                </li>
            @else
                <li class="header__nav__menu__link">
                    <a href="{{ route('login') }}">Connection</a>
                </li>
            @endauth
        </ul>
    </nav>
</header>

<div class="container flex mt-50 mb-50">
    <div class="bloc2">
            <img class="cover-show" src="{{Storage::url($podcast->cover_file)}}" alt="cover de podcast">
    </div>

    <div class="bloc2">
        <h2> {{ $podcast->title }} </h2> <br>
        <p class="name">{{$podcast -> user -> name}}</p>
        <p class="description">{{$podcast -> description}}</p>
        <audio controls>
            <source src="{{Storage::url($podcast->audio_file)}}" type="{{Storage::mimeType($podcast->audio_file)}}">
        </audio>
    </div>
</div>

</body>
</html>
