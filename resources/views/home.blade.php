<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>

@if (Route::has('login'))
    <div>
        @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            <a href="{{ route('podcasts.index') }}">Gérer les podcasts</a>
        @else
            <a href="{{ route('login') }}">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif

<h1>Tous nos podcasts :</h1>

<ul>
    @foreach($podcasts as $podcast)
        <li><a href="{{ route ('podcasts.show',$podcast)}}">{{ $podcast->title }}</a></li>
    @endforeach
</ul>

</body>
</html>
