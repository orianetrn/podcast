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

<a href="{{route('podcasts.create')}}">Ajouter un podcast</a>

<ul>
    @foreach($podcasts as $podcast)
        <li>
            <a href="{{ route ('podcasts.show',$podcast)}}">{{ $podcast->title }}</a>
            <a href="{{route('podcasts.edit', $podcast)}}">Modifier</a>
            <form action="{{route('podcasts.destroy', $podcast)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
