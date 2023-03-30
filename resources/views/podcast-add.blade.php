<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un podcast</title>
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

<h1>Ajouter un podcast</h1>

<div class="container-form">
    <div class="blocs bloc-form">

        <form action="{{route('podcasts.store', $podcast)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form">
                <label>Titre
                    <input class="input-form" type="text" name="title">
                </label>
                @error('title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form">
                <label>Description
                    <input class="input-form" type="text" name="file_name">
                </label>
                @error('file_name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form">
                <label>Pochette
                    <input type="file" name="cover_file">
                </label>
            </div>

            <div class="form">
                <label>Audio
                    <input type="file" name="audio_file">
                </label>
            </div>

            <button class="button" type="submit">Ajouter</button>

        </form>

    </div>
</div>



</body>
</html>
