<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

<header class="header">
    <div class="header__logo">
        <a href="{{ route('home') }}">
            <img class="logo" src="logo.png" alt="logo">
        </a>
    </div>
    <nav class="header__nav">
        <ul class="header__nav__menu">
            @auth
                <li class="header__nav__menu__link">
                    <a href="{{ route('podcasts.index') }}">Gérer les podcasts</a>
                </li>
                <li class="header__nav__menu__link">
                    <a href="{{ route('logout') }}">Log out</a>
                </li>
            @else
                <li class="header__nav__menu__link">
                    <a href="{{ route('login') }}">Log in</a>
                </li>
            @endauth
        </ul>
    </nav>
</header>


<h1>Tous les podcasts</h1>


@foreach($podcasts as $podcast)

    <div class="container blocs">
        <div class="bloc-liste">
            <a href="{{ route ('podcasts.show',$podcast)}}">
                <img class="cover-liste" src="{{Storage::url($podcast->cover_file)}}" alt="cover de podcast">
            </a>
        </div>

        <div class="bloc-liste">
           <h2> <a href="{{ route ('podcasts.show',$podcast)}}">{{ $podcast->title }}</a> </h2> <br>
            <a class="button-liste" href="{{ route ('podcasts.show',$podcast)}}">Ecouter le podcast</a>
        </div>
    </div>

@endforeach


</body>
</html>
