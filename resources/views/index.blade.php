<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des podcasts</title>
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

<h1>Gestion des podcasts :</h1>

<a class="button" href="{{route('podcasts.create')}}">Ajouter un podcast</a>

@if(session("message"))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif

<div class="container flex mt-25 mb-50">
    @foreach($podcasts as $podcast)
        <div class="flex bloc2 bg-liste">
            <div class="bloc2">
                <img class="cover-liste" src="{{Storage::url($podcast->cover_file)}}" alt="cover de podcast">
            </div>

            <div class="bloc2">
                <h2> <a href="{{ route ('podcasts.show',$podcast)}}">{{ $podcast->title }}</a> </h2> <br>
                <a class="button-liste" href="{{route('podcasts.edit', $podcast)}}">Modifier</a>
                <form action="{{route('podcasts.destroy', $podcast)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="button-liste" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
