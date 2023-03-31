<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artistes</title>
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
            <li class="header__nav__menu__link">
                <a href="{{ route('artistes.index') }}">Les artistes</a>
            </li>
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

<h1>Tous les artistes :</h1>

<div class="container flex mb-50">
    @foreach($users as $user)
        <div class="flex bloc2 bg-liste">
            <div class="bloc2">
                <a href="{{ route ('artistes.show',$user)}}">
                    <img class="cover-liste" src="{{asset('user.png')}}" alt="icone de user">
                </a>
            </div>

            <div class="bloc2">
                <h2> <a href="{{ route ('artistes.show',$user)}}">{{ $user->name }}</a> </h2>
                <a class="button-home" href="{{ route ('artistes.show',$user)}}">
                    Voir tous ses podcasts
                </a>
            </div>
        </div>
    @endforeach
</div>

</body>
</html>
