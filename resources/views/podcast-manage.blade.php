<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des podcasts</title>
</head>
<body>

<h1>Gestion des podcasts :</h1>

<ul>
    @foreach($podcasts as $podcast)
        <li>
            {{ $podcast->title }}
            <a href="{{route('podcast.edit', $podcast)}}">Modifier</a>
        </li>
    @endforeach
</ul>
</body>
</html>
