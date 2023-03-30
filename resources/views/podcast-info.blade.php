<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>{{$podcast->title}}</h1>

<p>Créé par : {{$podcast -> user -> name}}</p>
<p>Description : {{$podcast -> file_name}}</p>

<img src="{{Storage::url($podcast->cover_file)}}">
<audio controls>
    <source src="{{Storage::url($podcast->audio_file)}}" type="audio/ogg">
</audio>

</body>
</html>
